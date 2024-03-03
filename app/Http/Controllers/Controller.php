<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnJsonSuccess($message, $data=null){
        if($data == null){
            return response()->json([
                'status' => 'success',
                'message' => $message
            ], 200);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ], 200);
        }
    }

    public function returnJsonError($message, $statusCode, $data=null){
        if($data == null){
            return response()->json([
                'status' => 'error',
                'message' => $message
            ], $statusCode);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => $message,
                'data' => $data
            ], $statusCode);
        }
    }
}
