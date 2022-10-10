<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories_ouvrage extends Model
{
    use HasFactory;

    protected $table = 'categories_ouvrages';

    protected $fillable = [
        'libelle',
    ];
}
