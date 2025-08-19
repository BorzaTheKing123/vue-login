<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Features\StrankeFeatures\StoreNewStrankaFeature;

class StrankeController extends Controller
{
    public function index()
    {
        return "hello";
    }

    public function create()
    {
        return Inertia::render('AddClients', ['id' => Auth::id()]);
    }

    public function store(Request $request)
    {
        return new StoreNewStrankaFeature($request)->handle();
    }
}
