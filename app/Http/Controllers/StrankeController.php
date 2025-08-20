<?php

namespace App\Http\Controllers;

use App\Features\StrankeFeatures\EditStrankaFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Features\StrankeFeatures\StoreNewStrankaFeature;
use App\Features\StrankeFeatures\ShowStrankeFeature;
use App\Features\StrankeFeatures\UpdateStrankaFeature;

class StrankeController extends Controller
{
    public function index(Int $id)
    {   
        //return $id;
        return new ShowStrankeFeature($id)->handle();
    }

    public function create()
    {
        return Inertia::render('AddClients', ['id' => Auth::id()]);
    }

    public function store(Request $request)
    {
        return new StoreNewStrankaFeature($request)->handle();
    }

    public function edit(Int $id, String $stranka) // $id je samo zato da sprejme id od userja, ker sta podana 2 parametra
    {   
        return new EditStrankaFeature($stranka)->handle();
    }

    public function update(Request $request)
    {
        return new UpdateStrankaFeature($request)->handle();
    }
}
