<?php

namespace App\Domains\StrankeJobs;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Stranka;

class UpdateStrankaJob
{
    public function __construct(private $request, private $info)
    {

    }

    public function handle()
    {
        $info = Stranka::where('name', $this->request->input('name'))->where('user_id', Auth::id())->first();
        if (Auth::id() == $info->user_id)
        {
            $info = $this->request->input();

            Stranka::where('name', $this->request->input('name'))->where('user_id', Auth::id())->save($info);
            return true;
        }
    }
}
