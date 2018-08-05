<?php

namespace App\Http\Resources;

use App\SubInputList;
use Illuminate\Http\Resources\Json\Resource;

class InputListResource extends Resource
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
            'sub_input_lists' => SubInputList::where('input_list_id', $this->id)->get()
        ];
    }
}
