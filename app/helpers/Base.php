<?php


use Illuminate\Http\Request;

 function upload_file( $path,$imageRequest)
{
       $file=$imageRequest->getClientOriginalName();
       $imageRequest->storeAs($path, $file,'local');
       return $file;
}




function data_api($data){
    return [
        'status' => 'success',
        'message' => 'Data fetched successfully',
        'data'=>response()->json($data),
    ];
}




