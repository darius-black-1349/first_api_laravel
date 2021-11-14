<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validData = $this->validate($request, [
            'body' => 'required' 
        ]);


        auth()->user()->comments()->create($validData);

        return response([
            'data' => [

                'message' => 'نظر شما با موفقیت ثبت گردید',
                
            ],

            'status' => 'success'
        ]);
    }
}
