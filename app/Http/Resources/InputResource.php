<?php

namespace App\Http\Resources;

use App\InputList;
use Illuminate\Http\Resources\Json\Resource;

class InputResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'input_lists' => InputList::where('input_id', $this->id)->get()
        ];
    }
}
