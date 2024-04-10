<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\File;
use Nette\Utils\Image;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

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
        };

        return redirect()->route('home', [
            'user' => $user, 
        ])->with('success', 'Utilisateur mis à jour avec succès !'); 
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
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
    }

  

}
