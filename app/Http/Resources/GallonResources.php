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
            'default_ml' => intVal($this->default_ml),
            'current_ml' => intVal($this->current_ml),
            'description' => $this->description,
        ];
    }
}
