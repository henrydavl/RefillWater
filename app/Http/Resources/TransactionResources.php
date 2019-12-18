<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResources extends JsonResource
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
            'bottle_size' => intVal($this->bottle->capacity),
            'gallon_id' => $this->gallon_id,
            'cost' => intVal($this->bottle->price),
            'transaction_date' => $this->created_at->format('m/d/Y'),
        ];
    }
}
