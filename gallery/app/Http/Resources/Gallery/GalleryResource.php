<?php

namespace App\Http\Resources\Gallery;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'gallery';

    public function toArray($request)
    {
        return [
            'name' => $this->resource->name,
            'address' => $this->resource->address,
            'founded' => $this->resource->founded,
        ];
    }
}
