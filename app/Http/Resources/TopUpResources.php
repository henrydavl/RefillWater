<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopUpResources extends JsonResource
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
            'topUp_by' => $this->admin->name,
            'amount' => intVal($this->amount),
            'status' => $this->is_claimed == 1 ? 'Success' : 'Pending',
        ];
    }
}
