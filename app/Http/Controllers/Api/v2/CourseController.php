<?php

namespace App\Http\Controllers\Api\v2;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\CourseCollection;
use App\Http\Resources\v2\CourseResource;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(4);

        return new CourseCollection($courses);
    }

    public function single(Course $course)
    {
        return new CourseResource($course);
    }
}
