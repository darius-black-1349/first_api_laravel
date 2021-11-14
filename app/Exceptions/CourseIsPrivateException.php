<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CourseIsPrivateException extends Exception
{
    public function render($request){
        
        return $request->expectsJson() ? 

        new JsonResponse([
            'data' => 'course is private',
            'status' => 'error'
        ], Response::HTTP_UNAUTHORIZED) : view('errors.courseisprivate');
    }
}
