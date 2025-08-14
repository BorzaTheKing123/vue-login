<?php

namespace App\Domains\UserJobs;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class UserInfoValidationJob
{

    protected $userData;

    public function __construct(private $request)
    {

    }

    public function handle(): RedirectResponse
    {
        $credentials = $this->request->validate([
            'username' => ['required', 'string', 'alpha_dash', 'min:3', 'max:255', 'unique:users,username'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()] // Uporabi laravelove password defaults,
            //torej 8 dolžina, ena velika in vsaj ena mala črka, znak in številka
        ]);

        return $credentials;
    }
}