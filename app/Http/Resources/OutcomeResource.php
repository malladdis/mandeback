<?php

namespace App\Http\Resources;

use App\Models\Outcome;
use Illuminate\Http\Resources\Json\Resource;

class OutcomeResource extends Resource
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
            'name' => $this->name,
            'child' => Outcome::where('parent_id', $this->id)->get()
        ];
    }
}
