<?php

namespace App\Domains\UserJobs;

use Inertia\Inertia;

class ShowRegisterFormJob
{
    public function handle()
    {
        return Inertia::render('Register');
    }
}