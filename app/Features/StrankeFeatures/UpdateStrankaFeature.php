<?php

namespace App\Features\StrankeFeatures;

use App\Domains\StrankeJobs\UpdateStrankaJob;
use App\Domains\StrankeJobs\ValidateStrankaJob;

class UpdateStrankaFeature
{
    public function __construct(private $request)
    {

    }

    public function handle()
    {   
        $info = new ValidateStrankaJob($this->request)->handle();
        return new UpdateStrankaJob($this->request, $info)->handle();
    }
}