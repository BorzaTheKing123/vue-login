<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function show()
    {
        return Inertia::render('Home');
    }

    public function index(Int $id)
    {
        if ($id === Auth::id())
        {
            dd(Auth::id());
            // Tukaj je koda za pridobivanje strank Stranka::findAll($id)
        }
    }
}
