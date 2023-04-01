<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Session,Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if(Auth::check()){
           return redirect("products")->withSuccess('You are Already Login');
        };

        if($request->isMethod('get')){
            return view('auth.login');
        }
        
        $request->validate([
            'email' => "required",
            'password' => "required",
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
            return redirect()->intended('products')
            ->withSuccess('You have Successfully loggedIn');

        return redirect("login")->withSuccess('Oops! You have entered invalid credentials');
    }
    

    
    public function register(Request $request)
    {
        if(Auth::check()){
            return redirect("products")->withSuccess('You are Already Login');
         };
        
        if($request->isMethod('get')){
            return view('auth.register');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);

        $data = $request->all();
        $check = $this->create($data);
        
        return redirect('products');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
