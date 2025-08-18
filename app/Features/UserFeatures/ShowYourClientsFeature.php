<?php

namespace App\Features\UserFeatures;
use App\Domains\UserJobs\ShowYourClientsJob;

class ShowYourClientsFeature
{
    public function __construct(private $id)
    {
        
    }

    public function handle()
    {
        return new ShowYourClientsJob($this->id)->handle();
    }
}