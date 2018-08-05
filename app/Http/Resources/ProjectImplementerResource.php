<?php

namespace App\Http\Resources;

use App\Models\Implementer;
use Illuminate\Http\Resources\Json\Resource;

class ProjectImplementerResource extends Resource
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
            'groups' => Implementer::find($this->implementer_id)
        ];
    }
}
