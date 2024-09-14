<?php

namespace App\Http\Resources\Piece;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PieceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'pieces';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
