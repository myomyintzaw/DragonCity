<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'age' => ['required'],
            'phone' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [
            'name.required' => 'please enter your name',
            'name.alpha' => 'name must be only letter',
            'email.required' => 'please enter your email',
            'password.required' => 'please enter your password',
            'age.required' => 'please enter your age',
            // 'age.between'=>'age must be 18 advance and untail 90',
            'phone.required' => 'please enter your phone',
            'phone.numeric' => 'phone must be number',

        ])->validate();
        return User::create([
            'name' => $input['name'],
            'age' => $input['age'],
            'gender' => $input['gender'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
