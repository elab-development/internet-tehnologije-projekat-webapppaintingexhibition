<?php

namespace App\Http\Resources\Artist;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'artist';

    public function toArray($request)
    {
        return [
            'name' => $this->resource->name,
            'nationality' => $this->resource->nationality,
            'birth' => $this->resource->birth,
        ];
    }
}
