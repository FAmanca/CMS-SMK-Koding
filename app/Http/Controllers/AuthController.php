<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup() {
        return view('signup');
    }

    public function signin() {
        return view('signin');
    }

    public function register(Request $request) {

    }

    public function login(Request $request) {
        
    }
}
