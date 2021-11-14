<?php

namespace App\Http\Resources\v2;

use App\Http\Resources\v1\EpisodeCollection;
use Illuminate\Http\Resources\Json\Resource;

class CourseResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'body' => str_limit($this->body, 200),
            'price' => $this->price,
            'image' => $this->image,
            'date' => jdate($this->created_at)->format('datetime'),
            'episodes' => new EpisodeCollection($this->episodes)
        ];
    }
}
