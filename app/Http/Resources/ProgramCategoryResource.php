<?php

namespace App\Http\Resources;

use App\Models\Program;
use Illuminate\Http\Resources\Json\Resource;

class ProgramCategoryResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'programs' => ProgramResource::collection(Program::where('program_category_id', $this->id)->get())
        ];
    }
}
