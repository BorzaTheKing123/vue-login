<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Features\StrankeFeatures\StoreNewStrankaFeature;
use Illuminate\Support\Facades\DB;

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

    public function edit(Int $id, String $stranka)
    {   
        $info = DB::table('stranke')->where('name', $stranka)->first();
        if (Auth::id() == $info->user_id)
        {   
            return Inertia::render('UrejanjeStranke', ['stranka' => $info]);
        }
    }
}
