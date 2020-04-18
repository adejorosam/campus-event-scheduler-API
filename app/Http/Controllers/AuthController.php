<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;


class AuthController extends Controller
{
    //

    public function users(){
        $users = User::all();
        $response = [
            'message' => 'Users',
            'users' => $users,
        ];
        
        return response()->json($response, 201);
    }
    public function register(Request $request){


        $this->validate($request, [
            'name'=> 'required',
            'email' => 'required|email',
        ]);
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password =\Hash::make($request['password']);

        if($user->save()){
            $user->view_users = [
                "href"=>"api/v1/users",
                "method"=>'GET'
        ];
            $response = [
                'message' => 'User created',
                'user' => $user,

        ];
            return response()->json($response, 201);
        }

    }

    // public function login(Request $request){
    //     $email = $request['email'];
    //     $password = $request['password'];
    //     // $credentials = $request->only('email', 'password');
    //     $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
    //     // try {
    //     //     if(!$token = JWTAuth::attempt($credentials)){
    //     //         return response()->json(['message'=> 'Invalid credentials'], 401);
    //     //     }
    //     // } catch (JWTException $e) {
    //     //     return response()->json(['message'=>'Could not create token'], 401);
            
    //     // }
    //     return response()->json(['token'=>$token]);

    // }
    public function login() {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Wrong login credentials.'], 401);
        }
        return response()->json([
            'token' => $token,
            'expires' => auth('api')->factory()->getTTL() * 60,
        ]);
}
}
