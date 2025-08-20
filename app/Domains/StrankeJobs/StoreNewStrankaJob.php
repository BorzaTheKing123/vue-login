<?php

namespace App\Domains\StrankeJobs;

use App\Models\Stranka;
use Illuminate\Support\Facades\Auth;

class StoreNewStrankaJob
{
    public function __construct(private $request, private $input)
    {

    }

    private function checkExisting() {
        //
    }

    public function handle()
    {   
        if ($this->request->input('user_id') == Auth::id())
        {
            $this->input['user_id'] = $this->request->input('user_id');

            Stranka::create($this->input);

            return true;
        }

        return false;
        
    }
}