<?php

namespace App\Domains\StrankeJobs;

use App\Models\Stranka;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreNewStrankaJob
{
    public function __construct(private $request, private $input)
    {

    }

    public function handle()
    {   
        if ($this->request->input('user_id') == Auth::id() and Stranka::where('name', $this->request->input('name'))->where('user_id', Auth::id())->first() == '')
        {
            $this->input['user_id'] = $this->request->input('user_id');;
            // $stranka = new Stranka();
            // $stranka->user_id = (Int) $this->request->input('user_id');
            // $stranka->name =  $this->input['name'];
            // $stranka->email =  $this->input['email'];
            // $stranka->phone =  $this->input['phone'];
            // $stranka->dejavnost =  $this->input['dejavnost'];
            // $stranka->save();
            Stranka::create($this->input);
            return true;
            
            // return $this->request->input('user_id');
            // DB::table('stranke')->insert([
            //     'user_id' => $this->request->input('user_id'),
            //     'name' => $this->input['name'],
            //     'email' => $this->input['email'],
            //     'phone' => $this->input['phone'],
            //     'dejavnost' => $this->input['dejavnost'],
            // ]);
            // return "hello";
        }

        return $this->input;
        
    }
}