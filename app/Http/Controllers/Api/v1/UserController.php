<?php

namespace App\Http\Controllers\Api\v1;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\User;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function login(Request $request){

        //validation data
       $validData = $this->validate($request, [
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        
        //check login user
        if(! auth()->attempt($validData)){
            return response([
                'data' => 'اطلاعات صحیح نیست',
                'status' => 'error'
            ], 403);
        }

        
        //return response

        auth()->user()->update([
            'api_token' => Str::random(100)
        ]);

        
        return new UserResource(auth()->user());
    }
    public function register(Request $request){
        
        // validation requests

        $validRegister = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            
        ]);

        
        // $user = User::find(1)->update([
        //     'name' => 'darius',
        //     'email' => 'darius134966@gmail.com',
        //     'passowrd' => '123456789'
        // ]);
       
        // return 'paswrd changed';


        $user = User::create([
            'name' => $validRegister['name'],
            'email' => $validRegister['email'],
            'password' => bcrypt($validRegister['password']),
            'api_token' => Str::random(100),
        ]);


        return new UserResource($user);

    }


  
}
