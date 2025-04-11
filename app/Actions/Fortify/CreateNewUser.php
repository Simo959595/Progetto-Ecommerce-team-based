<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make(
            $input,
            [
                'name' => ['required', 'min:2', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
                'surname' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
                'date' => ['required', 'date', 'before:' . now()->subYears(18)->toDateString()],
                'telephone_number' => ['required', 'regex:/^\+?[0-9]{10,15}$/'],


            ],
            [
                'name.required' => 'Il nome è obbligatorio.',
                'name.regex' => 'Il nome può contenere solo lettere.',
                'name.min' => 'Il nome deve contenere almeno 2 caratteri.',

                'surname.required' => 'Il cognome è obbligatorio.',
                'surname.regex' => 'Il cognome può contenere solo lettere.',

                'telephone_number.required' => 'Il numero di telefono è obbligatorio.',
                'telephone_number.regex' => 'Il numero di telefono dev\'essere nel formato corretto e deve avere tra 8 e 15 cifre.',

                'email.required' => "L'email è obbligatoria.",
                'email.email' => "Inserisci un'email valida.",
                'email.unique' => "L'email è già registrata.",

                'password.required' => 'La password è obbligatoria.',
                'password.min' => 'La password deve contenere almeno 8 caratteri.',
                'password.confirmed' => 'Le password non coincidono.',

                'date.required' => 'La data di nascita è obbligatoria.',
                'date.date' => 'Inserisci una data di nascita valida.',
                'date.before' => 'Devi avere almeno 18 anni per registrarti.',
            ]
        )->validate();
        Session::flash('success', 'Registrazione completata con successo! Ora puoi creare il tuo annuncio.');



        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'surname' => $input['surname'],
            'telephone_number' => $input['telephone_number'],
            'date' => Carbon::parse($input['date'])->format('d-m-Y'),
        ]);
    }
}
