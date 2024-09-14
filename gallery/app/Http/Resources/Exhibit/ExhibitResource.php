<?php

namespace App\Http\Resources\Exhibit;

use App\Http\Resources\Gallery\GalleryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ExhibitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'exhibit';

    public function toArray($request)
    {
        return [
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'date' => $this->resource->date,
            'gallery' => new GalleryResource($this->resource->gallery)
        ];
    }
}
