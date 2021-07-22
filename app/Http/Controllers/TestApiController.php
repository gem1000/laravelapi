<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TestApi;

class TestApiController extends Controller
{
    //

    public function createPost(){

          $curl = curl_init();

          request()->validate([
            'title'=>'required',
            'body'=>'required',
            'userid'=>'required'
          ]);
          $title = request('title');
          $body = request('body');
          $userid = request('userid');

          $data = [
            "title"=>$title,
            "body"=>$body,
            "userId"=>$userid
          ];

          curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        

        $response = json_decode($response);

       // dd($response->title);
        
        if($response){

            $create = Testapi::create([
                'user_id'=> $response->userId,
                'title'=>$response->title,
                'body'=>$response->body
            ]);

            return response()->json([
                "success"=>"Post entered in database"
            ]);
        }else{
             return response()->json([
                "Error"=>"Post could not be entered"
            ]);
            
        }

    }
}

//jsend
