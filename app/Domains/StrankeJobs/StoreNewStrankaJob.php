<?php

namespace App\Domains\StrankeJobs;

use App\Models\Stranka;
use Illuminate\Support\Facades\Auth;

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
            'name' => ['required', 'string', 'alpha_dash', 'min:2', 'max:255', 'unique:stranke,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,username'],
            'phone' => ['required', 'string', 'min:5'],
            'dejavnost' => ['required', 'string']
            ]);

            $input['user_id'] = $this->request->input('user_id');

            Stranka::create($input);

            return true;
        }

        return false;
        
    }
}