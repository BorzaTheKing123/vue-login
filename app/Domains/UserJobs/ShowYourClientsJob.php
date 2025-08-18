<?php

namespace App\Domains\UserJobs;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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
            return Inertia::render('Stranke', ['id' => $this->id]);
            // Tukaj je koda za pridobivanje strank Stranka::findAll($id)
        }
    }
        
}