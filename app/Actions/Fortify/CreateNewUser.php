<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

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
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();


        return
            $this->userService->createUser($input);
        //  User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'dob' => $input['dob'],
        //     'phone' => $input['phone'],
        //     'account' => $input['account'],
        //     'dealer_number' => $dealerNumber,
        //     'user_type' => $input['user_type'],
        //     'category_id' => $input['category_id'],
        //     'password' => Hash::make($input['password']),
        // ]);
    }
}
