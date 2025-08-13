<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Features\UserFeatures\ShowRegisterFormFeature;

class RegisterController extends Controller
{
    public function show()
    {
        return new ShowRegisterFormFeature()->handle();
    }
}
