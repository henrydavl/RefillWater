<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DummyResource extends JsonResource
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
            'capacity' => intVal($this->capacity),
            'price' => intVal($this->price),
            'own_by' => $this->user->name,
        ];
    }
}
