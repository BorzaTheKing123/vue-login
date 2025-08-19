<?php

namespace App\Domains\UserJobs;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowYourClientsJob
{
    public function __construct(private $id)
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->id === Auth::id())
        {
            $stranke = DB::table('stranke')->get()->where('user_id', (string) $this->id);
            return Inertia::render('Stranke', [$stranke]);
            // Tukaj je koda za pridobivanje strank Stranka::findAll($id)
        }
    }
        
}