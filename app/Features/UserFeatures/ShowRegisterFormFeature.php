<?php

namespace App\Features\UserFeatures;

use App\Domains\UserJobs\ShowRegisterFormJob;

class ShowRegisterFormFeature
{
    public function handle()
    {
        return new ShowRegisterFormJob()->handle();
    }
}