<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use Carbon;
use JWTAuth;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('jwt.auth', ['only' => ['update', 'store', 'destroy']]);
     }
    public function index()
    {
        //
        $meetings = Meeting::all();
        foreach ($meetings as $meeting) {
            # code...
            $meeting->view_meeting = [
                "href" => "api/v1/meeting/" . $meeting->id,
                "method" => "GET" 
        ];
        }
        $response = [
            "message" => "Meetings",
            "meeting" => $meetings,
        ];
        return response()->json($response, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "title"=> "required",
            "description" => "required",
            "time" =>"required",
            

        ]);

        if(! $user = JWTAuth::parseToken()->authenticate()){
            return "Not found";
        }

        $meeting = new Meeting;
        $meeting->title = $request["title"];
        $meeting->description = $request["description"];
        $meeting->time = $request["time"];
        $meeting->user_id = $user->id;
        
        if($meeting->save()){
            $meeting->users()->attach($user->id);
            $meeting->view_meeting = [
            "href" => "api" . "/v1/meeting/" . $meeting->id,
            "method" => "GET"
        ];
        $response = [
            "message" => "Meeting created",
            "meeting" => $meeting
        ];
        return response()->json($response, 201);
    }

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $meeting = Meeting::with('users')->where('id', $id)->firstOrFail();
        if($meeting != null){
            $meeting->view_meeting = [
                "href" => "api/v1/meeting",
                "method" => "GET, POST"
            ];
            $response = [
                "message" => "Gotten it",
                "meeting" => $meeting
            ];
            return response()->json($response, 201);
        }
        return response()->json(["message"=>"Not found"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            "title"=> "required",
            "description" => "required",
            "time" =>"required",

        ]);
        if(!$user = JWTAuth::parseToken()->authenticate()){
            return "Not found";
        };
        $meeting = Meeting::find($id);
        if($meeting->user_id != $user->id){
            return response()->json(['message'=>'Unauthorized action']);
        }
        
        $meeting->title = $request["title"];
        $meeting->description = $request["description"];
        $meeting->time = $request["time"];
        $meeting->user_id = $user->id;
        $meeting->update();
        // $meeting->view_detail = [
        //     "href" => ''
        // ]
        $response = [
            'message' => "Successfully updated",
            'meeting' => $meeting
        ]
        return response()->json($response, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $meeting = Meeting::find($id);
        if(! $user = JWTAuth::parseToken()->authenticate()){
            return response()->json(['message' => 'Forbidden']);
        }
        if($meeting->user_id != $user->id){
            return response()->json(['message'=>'Unauthorized action']);
        }
        $users = $meeting->users;
        $meeting->users()->detach();
        if(!$meeting->delete()){
            foreach ($users as $user) {
                $meeting->users()->attach($user);
            }
            return response()->json(['message'=>'Deletion failed'], 404);
        }

        $response = [
            'message' => 'Message deleted hitch-free',
            'create' => [
                'href' => 'api/v1/meeting',
                'method' => 'POST',
                'params' => 'title, description, time'
        ]
    ];
        return response()->json($response, 201);
    }
}
