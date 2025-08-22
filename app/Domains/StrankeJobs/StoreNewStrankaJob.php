<?php

namespace App\Domains\StrankeJobs;

use App\Models\Stranka;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreNewStrankaJob
{
    public function __construct(private $request, private $input)
    {

    }

    public function handle()
    {   
        if (! Stranka::where('email', $this->request->input('email'))->exists())
        {
            $this->input['user_id'] = Auth::id();
            $stranka = Stranka::create($this->input);

            return true;
        }

        return $this->input;
        
    }
}