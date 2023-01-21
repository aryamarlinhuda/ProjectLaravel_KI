<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class MasukController extends Controller
{
    public function index(){
        return view('masuk');
    }

    public function masuk(Request $request) {
        // dd($request->all());
        $data = User::where('email',$request->email)->firstOrFail();
        if($data) {
            if(Hash::check($request->password,$data->password)) {
                session(['berhasil_login' => true]);
                return view('tampil',['data' => $request]);
            }
        }
        return redirect('/masuk')->with('message','Email atau Password tidak sesuai');
    }

    public function lanjut(Request $request) {
        return view('info',['data' => $request]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/masuk');

    }
}
