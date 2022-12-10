<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/inicio');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request){

        if(!Auth::validate($request->validated())){
            return redirect()->to('/login')->withErrors('auth.failed');
        }

        $user = Auth::getProvider()->retrieveByCredentials($request->validated());

        Auth::login($user);

        return redirect('/inicio');

    }

}
