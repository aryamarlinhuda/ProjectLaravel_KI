<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function submit(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        return view('submit',['data' => $request]);
    }
}
