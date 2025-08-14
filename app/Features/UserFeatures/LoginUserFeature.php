<?php

namespace App\Features\UserFeatures;

use App\Domains\UserJobs\StoreNewUserJob;
use App\Domains\UserJobs\UserInfoValidationJob;
use Illuminate\Support\Facades\Auth;

class RegisterUserFeature
{
    public function __construct(private $request)
    {
        
    }
    public function handle()
    {
        $credentials = new UserInfoValidationJob($this->request)->handle();
 
        if (Auth::attempt($credentials)) {
            $this->request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        // Store
    }
}