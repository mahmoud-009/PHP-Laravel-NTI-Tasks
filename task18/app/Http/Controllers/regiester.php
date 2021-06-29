<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class regiester extends Controller
{
    public function index()
    {
        //
            $data = User::get();

            return view('users.index',['data' => $data ]);
    }

    public function create()
    {
        //
         return view('users.add');
    }




}
