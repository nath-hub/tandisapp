<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     *
     */
    public function update(User $user, array $input)
    {

        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'], 
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique('users')->ignore($user->id),
        //     ],
        //     'phone' => ['integer', 'max:15'],
        //     "town" => ["string"],
        //     "type" => ["string"],
        //     "country" => ["string"],
        //     "birth_date" => ["date"],
        //     'photo' => 'image', 'mimes:jpeg,png,jpg,gif,svg',
        // ])->validateWithBag('updateProfileInformation');
            // dd($input);
        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {

            $this->updateVerifiedUser($user, $input);
        } else {
             
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'town' => $input['town'],
                'type' => $input['type'],
                'country' => $input['country'],
                'birth_date' => $input['birth_date'],
                // 'photo' => $avatarPath,
            ])->save();

            return app(ProfileInformationUpdatedResponse::class);
        };

         
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'phone' => $input['phone'],
            'town' => $input['town'],
            'type' => $input['type'],
            'country' => $input['country'],
            'birth_date' => $input['birth_date'],
            // 'photo' => $avatarPath,
        ])->save();

        $user->sendEmailVerificationNotification();

        return app(ProfileInformationUpdatedResponse::class);
    }

  

}
