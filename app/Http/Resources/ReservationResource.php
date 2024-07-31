<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return  [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
            'client' => $this->client,
            'origin' => $this->origin,
            'destiny' => $this->destination,
            'user' => $this->user,
            'tax' => $this->tax,
            'price' => $this->price,
            'status' => $this->status,
            'travellers' => $this->travellers,
            'totalAmount' => $this->total_amount,
            'slug' => $this->slug,
            'time' => $this->time,
            'date' => $this->date,
            'time_end' => $this->time_end
        ];
    }
}
