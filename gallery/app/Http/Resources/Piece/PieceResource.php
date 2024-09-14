<?php

namespace App\Http\Resources\Piece;

use App\Http\Resources\Artist\ArtistResource;
use App\Http\Resources\Exhibit\ExhibitResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PieceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'piece';

    public function toArray($request)
    {
        return [
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'price' => $this->resource->price,
            'artist' => new ArtistResource($this->resource->artist),
            'exhibit' => new ExhibitResource($this->resource->exhibit),
        ];
    }
}
