<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Lietotajs;
use App\Models\Sesija;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the CSRF token
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            '_token' => 'required',
        ]);

        // Retrieve the username and password from the request
        $username = $request->input('username');
        $password = $request->input('password');
        $data = $request->input();

        // Perform your login validation and authentication logic here
        // For example, you can check if the username and password match a user in the database
        $usr = Lietotajs::select('lietotajvards')->where('lietotajvards', '=', $username)->where('parole', '=', $password)->first();

        if (isset($usr)) {//Pārbauda, vai ievadītais lietotājvārds sakrīt ar paroli
            return redirect()->route('home', ['username' => $username]);
        }
        else return view('login')->withErrors(['login' => 'nav kkas']);
        
        
        
    }

    public function showLoginForm()
    {
        
        return view('login')->withErrors(['login' => 'get izsaukts']);
    }
}
