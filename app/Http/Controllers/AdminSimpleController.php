<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSimpleController extends Controller
{
    public function check(Request $request){
        $admin = $request->validate([
            "login" => ["required","string"],
            "password" => ["required",'string']
        ]);
        if(Auth::attempt($admin)){
            return redirect(route('main'));
        }

        return redirect()->back()->withErrors('Нет такого юзера');
    }
}
