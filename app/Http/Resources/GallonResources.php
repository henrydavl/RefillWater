<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GallonResources extends JsonResource
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
            'id' => $this->id,
            'capacity' => ($this->current_ml / $this->default_ml) * 100 .'%',
            'description' => $this->description,
        ];
    }
}
