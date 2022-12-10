<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.registro');
    }

    public function register(RegisterRequest $request){
        User::create($request->validated());
        return redirect('/login')->with('success','Account created successfully');
    }
}
