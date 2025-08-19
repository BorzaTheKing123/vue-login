<?php

namespace App\Features\StrankeFeatures;

use App\Domains\StrankeJobs\StoreNewStrankaJob;

class StoreNewStrankaFeature
{
    public function __construct(private $request)
    {
        
    }

    public function handle()
    {
        return new StoreNewStrankaJob($this->request)->handle();
    }
}