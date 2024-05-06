<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopDestinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'likes' => $this->likes,
            'photo' => url('images/'.$this->photo),
        ];
    }

    /**
     * @param $tags
     * @return array
     */
    public static function arrayCollection($tags): array
    {
        $output = [];
        foreach ($tags as $tag) {
            $output[] = (new self($tag))->toArray($tag);
        }

        return $output;
    }
}
