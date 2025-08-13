<?php

namespace App\Features\UserFeatures;

use App\Domains\UserJobs\StoreNewUserJob;

class RegisterUserFeature
{
    public function __construct(private $request)
    {
        
    }
    public function handle()
    {
        // Validation
        // Store
        return new StoreNewUserJob($this->request)->handle();
    }
}