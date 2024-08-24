<?php

namespace App\Http\Resources\Exhibit;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExhibitCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'exhibits';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
