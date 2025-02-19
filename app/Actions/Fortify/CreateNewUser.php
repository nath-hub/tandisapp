<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Enterprise;
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),

            "phone" => ['required', 'string'], 
            "type",
            "photo",
            "web_site",
            "user_id",
            "name_enterprise" => ['nullable', 'required_if:type,"ENTERPRISE"'],
            "address" => ['nullable', 'required_if:type,"ENTERPRISE"'],
        ])->validate();

         $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            "phone" => $input["phone"],
            "type" => isset($input["type"]) ? $input["type"] = "ENTERPRISE" : $input["type"] = "INVEST",

        ]);

        if ($user->type === "ENTERPRISE") {
           $enterprise = Enterprise::create([
                "name_enterprise" => $input["name_enterprise"],
                "address" => $input["address"],
                "user_id"=> $user->id
            ]);
        };

        return $user;
    }
}