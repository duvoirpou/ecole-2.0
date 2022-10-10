<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:1'],
            'adresse' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:50'],
            'tel' => ['required', 'string', 'min:9', 'max:50'],
            'pseudo' => ['required', 'string', 'min:2', 'max:15', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'statut' => $input['statut'],
            'sexe' => $input['sexe'],
            'adresse' => $input['adresse'],
            'tel' => $input['tel'],
            'pseudo' => $input['pseudo'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
