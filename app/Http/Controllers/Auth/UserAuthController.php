<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'=>'required|max:255',
                'email'=>'required|email|unique:users',
                'password'=>"required|confirmed"
            ]);
    
            if($validator->fails()){
                return $validator->errors()->first();
            }
    
            $request['password'] = bcrypt($request->password);
            
            $data = ['name'=>$request->name,'email'=>$request->email,'password'=>$request->password];
    
            $user = User::create($data);

            $token = $user->createToken('API Token')->accessToken;

            return response(['user'=>$user,'token'=>$token]);

        } catch (\Exception $e) {
            // Log the error or return an error response
            return $e;
        }
        
    }

    public function login(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return $validator->errors()->filter();
        }
        
        $credentials = $request->only('email','password');
        
        if(!auth()->attempt($credentials)){
            return response(['error_message'=>"Incorrect Details. Please try again!"]);
        };

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user'=>auth()->user(),'token'=>$token]);

    }
    
    //
}
