<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResources extends JsonResource
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
          'description' => $this->description,
          'end_date' => $this->end_date,
          'image_url' => $this->path(),
        ];
    }
}
