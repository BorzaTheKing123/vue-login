<?php

namespace App\Domains\UserJobs;

use App\Models\User;
use Inertia\Inertia;

class StoreNewUserJob
{

    protected $userData;

    /**
     * Create a new job instance.
     *
     * @param array $userData
     */
    public function __construct(private $request)
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::create($this->request);
        return Inertia::render('Dashboard');
    }
}