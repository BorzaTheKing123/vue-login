<?php

namespace App\Domains\UserJobs;

use App\Models\User;
use Inertia\Inertia;

class StoreNewUserJob
{
    public function __construct(private $credentials)
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd("hi");
        User::create($this->credentials);
        return Inertia::render('Home');
    }
}