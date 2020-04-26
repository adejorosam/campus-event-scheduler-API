<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

/**
    * @group User management
    *
    * APIs for managing users
    */
class AuthController extends Controller
{
   
    public function users(){
        $users = User::all();
        $response = [
            'message' => 'Users',
            'users' => $users,
        ];
        
        return response()->json($response, 201);
    }
/**
    * @bodyParam name string required The name of the user. Example: Samson Adejoro
    * @bodyParam email string required The email of the user. Example: samsonadejoro@gmail.com
*/
/**    
    *@response
    *{
    *"message": "User created",
    *"user": {
        *"name": "Samson Adejoro",
        *"email": "samsonadejoro@gmail.com",
        *"updated_at": "2020-04-17T19:01:35.000000Z",
        *"created_at": "2020-04-17T19:01:35.000000Z",
        *"id": 3,
        *"view_users": {
            *"href": "api/v1/users",
            *"method": "GET"
        *}
    *}
*}
*/
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
    /**
    * @bodyParam email string required The email of the user. Example: samsonadejoro@gmail.com
    * @bodyParam password string The password of the user.
    */
    /**
    * @response
        *{
            *"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1ODcxNjQ3ODMsImV4cCI6MTU4NzE2ODM4MywibmJmIjoxNTg3MTY0NzgzLCJqdGkiOiJEbG9YcjRtRWw1MGk4aXg2Iiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.uGMmVmuhIdRbSODTQt3RMgSLEgYCFReMJurrshJlrCI",
            *"expires": 3600
        *}
    *}
    */

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
    /**
            * @urlParam id integer required The ID of the post.
        */
    /**
        * @response {
        *  {
        *  "message": "User Details",
        * "user": {
            *    "id": 3,
            *   "name": "Samson Adejoro",
            *  "email": "samsonadejoro@gmail.com",
            * "email_verified_at": null
    *}
*}
 */

    public function show($id){
        
        $user = User::find($id);
        $response = [
            "message" => "User Details",
            "user" => $user
    ];
    return response()->json($response, 201);
    }

    public function update(Request $request){
  
        $this->validate($request, [
            "name"=> "required",
        ]);

        $userInfo = JWTAuth::parseToken()->authenticate();

        if(!$userInfo){
            return response()->json(["message" => "Unauthenticated"], 401);
        };

        $user = User::find($userInfo->id);
        $user->name = $request['name'];
        $user->update();
        $response = [
            'message' => "Successfully updated",
            'user' => $user
    ];
        return response()->json($response, 201);



    }
}
