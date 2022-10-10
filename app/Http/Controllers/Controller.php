<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Atelier;
use App\Models\Ouvrage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $actualites = Actualite::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('accueil', compact('actualites'));
    }

    public function about()
    {
        return view('about');
    }

    public function ateliers()
    {
        $ateliers = Atelier::orderBy('created_at', 'desc')->paginate(6);

        return view('ateliers', compact('ateliers'));
    }

    public function actualites()
    {
        $actualites = Actualite::orderBy('created_at', 'desc')->paginate(6);

        return view('actualites', compact('actualites'));
    }

    public function showActualite($slug)
    {
        $actualite = Actualite::where('slug', $slug)->first();

        return view('show-actualite', compact('actualite'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function ouvrages()
    {
        $ouvrages = Ouvrage::orderBy('created_at', 'desc')->paginate(6);

        return view('ouvrages', compact('ouvrages'));
    }

    /* La fonction de suppression des mots inutiles pour la recherche */
    private function remove_not_usefull_words($str)
    {
        // to lower case
        $str = strtolower($str);

        // exclude words (rajouter ceux qui manquent)
        $not_use_words = [
            'comment', 'que', 'qui', 'quand', 'pourquoi', 'pour', 'quoi',
            'comme', 'avec', 'sans', 'faire', 'avoir', 'être', 'mais',
            'ou', 'et', 'donc', 'or', 'ni', 'car', 'si', 'de', 'des',
            'un', 'une', 'juste', 'qu', 'est', 'sont', 'lors', 'en', 'a'
        ];

        $len = count($not_use_words);
        // remove words
        for ($i = 0; $i < $len; $i++) {
            $str = str_replace($not_use_words[$i] . ' ', '', $str);
        }

        return $str;
    }

    /* La fonction de recherche des mots clés */
    public function search()
    {

        $search = request()->input('search');

        $search_part = $this->remove_not_usefull_words($search);
        $search_words = explode(' ', $search_part);
        /* $search = array_filter($search);
        $search = array_unique($search);
        $search = array_values($search);
        $search = implode(' ', $search); */

        $actualites = Actualite::Where(function ($query) use ($search_words) {
            for ($i = 0; $i < count($search_words); $i++) {
                $query->orwhere('title', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('content', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('slug', 'LIKE', '%' . $search_words[$i] . '%');
            }
        })
            ->paginate(6);

        return view('result-search-actualites', compact('actualites', 'search'));
    }

    public function showOuvrage($slug)
    {
        $ouvrage = Ouvrage::where('slug', $slug)->first();

        return view('show-ouvrage', compact('ouvrage'));
    }

    public function searchOuvrage()
    {

        $search = request()->input('search');

        $search_part = $this->remove_not_usefull_words($search);
        $search_words = explode(' ', $search_part);

        $ouvrages = Ouvrage::Where(function ($query) use ($search_words) {
            for ($i = 0; $i < count($search_words); $i++) {
                $query->orwhere('titre', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('auteur', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('editeur', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('annee', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('description', 'LIKE', '%' . $search_words[$i] . '%');
                $query->orwhere('slug', 'LIKE', '%' . $search_words[$i] . '%');
            }
        })
            ->paginate(6);

        return view('result-search-ouvrages', compact('ouvrages', 'search'));
    }
}
