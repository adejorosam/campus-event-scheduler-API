<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\User;
use JWTAuth;

/**
    * @group Registration management
    *
    * APIs for managing registrations
    */

class RegistrationController extends Controller

{
    
    public function __construct(){
         $this->middleware('jwt.auth');
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
        * @authenticated
    */

    /**
        * @bodyParam meeting_id integer required The meeting_id of the meeting.
        
    */
    public function store(Request $request)
    {
        //
        

        if(! $user = JWTAuth::parseToken()->authenticate()){
            return response()->json(["message"=>"Unauthenticated"], 401);
        }
        $this->validate($request, [
            'meeting_id' => 'required',
        ]);
        $user_id = $user->id;
        $meeting_id = $request->input('meeting_id');
        $meeting = Meeting::find($meeting_id);
        $user = User::find($user_id);
        
        $message = [
            'message' => 'User is already registered for the meeting',
            'user' => $user,
            'meeting' => $meeting,
            'unregister' => [
                'href' => 'api/v1/registration/'. $meeting->id,
                'method' => 'DELETE'
            ]
    ];
    if($meeting->users()->where('users.id', $user->id)->first()){
        return response()->json($message, 500);
    };
    $user->meetings()->attach($meeting);
    $response = [
            'message' => 'User registered',
            'user' => $user,
            'neeting' => $meeting,
            'unregister' => [
                'href' => 'api/v1/registration/'. $meeting->id,
                'method' => 'DELETE'
            ]
    ];
    return response()->json($response, 201);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      /**
            * @authenticated
        */

    /**
        * @bodyParam meeting_id integer required The meeting_id of the meeting.
        
    */

        
    public function destroy($id)
    {
        //
        $user = JWTAuth::parseToken()->authenticate();
        $meeting = Meeting::find($id);
        $user = User::find($user->id);
        if(! $user){
            return response()->json(['message' => 'Forbidden']);
        }
        
        if(!$meeting->users()->where('users.id', $user->id)->first()){
            return response()->json(['message'=>'User not registered'], 404);
        }
        $meeting->users()->detach($user->id);
        $response = [
            'message' => 'User already un-registered',
            'user' => $user,
            'meeting' => $meeting,
            'register' => [
                'href' => 'api/v1/registration/',
                'method' => 'POST'
            ]
    ];
        return response()->json($response, 201);

    }
}
