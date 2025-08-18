<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Features\UserFeatures\ShowYourClientsFeature;

class SessionController extends Controller
{
    public function show()
    {
        return Inertia::render('Home');
    }

    public function index(Int $id)
    {
        return new ShowYourClientsFeature($id)->handle();
    }
}
