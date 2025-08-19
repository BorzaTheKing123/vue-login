<?php

namespace App\Domains\StrankeJobs;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreNewStrankaJob
{
    protected string $strankaName;
    protected array $strankaData;

    public function __construct(private $request)
    {
    }

    public function handle()
    {   
        if ($this->request->input('user_id') == Auth::id())
        {
            $input = $this->request->validate([
            'name' => ['required', 'string', 'alpha_dash', 'min:3', 'max:255', 'unique:stranke,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,username'],
            'phone' => ['required', 'string', 'min:5'],
            'dejavnost' => ['required', 'string']
            ]);

            DB::table('stranke')->insert([
                'user_id' => $this->request->input('user_id'),
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'dejavnost' => $input['dejavnost'],
            ]);

            return true;
        }
        
    }
}