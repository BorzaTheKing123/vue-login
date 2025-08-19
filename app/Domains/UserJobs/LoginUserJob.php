<?php

namespace App\Domains\UserJobs;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginUserJob
{

    protected $userData;

    public function __construct(private $request)
    {

    }

    public function handle()
    {
        $credentials = $this->request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $this->request->session()->regenerate();
            return Auth::id();
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}