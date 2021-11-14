<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Carbon;

class UploadController extends Controller
{
    public function image(Request $request, Filesystem $filesystem)
    {
        // return $request->file('image');

        $validImage = $this->validate($request, [
            'image' => 'required|mimes:png,jpeg,bmp|max:10240'
        ]);

        //receive file

        $file = $request->file('image');

        //file format

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;

        
        $imagePath = "/upload/images/{$year}/{$month}/{$day}";
        
        $fileName = $file->getClientOriginalName();
        
        //where the file will be save
        
        if($filesystem->exists(public_path("{$imagePath}/{$fileName}")))
        {
            $fileName = Carbon::now()->timestamp . "-{$fileName}";
        }

        $file->move(public_path($imagePath), $fileName);

        return response([
            'data' => [
                'image-url' => url("{$imagePath}/{$fileName}")
            ],
            'status' => 'success'
        ]);
    }

    public function file(Request $request)
    {

    }
}
