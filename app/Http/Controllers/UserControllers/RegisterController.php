<?php

namespace App\Http\Controllers\UserControllers;

use App\Features\UserFeatures\RegisterUserFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Features\UserFeatures\ShowRegisterFormFeature;

class RegisterController extends Controller
{
    public function show()
    {
        return new ShowRegisterFormFeature()->handle();
    }

    public function store(Request $request)
    {
        return new RegisterUserFeature($request)->handle();
    }
}
