<?php

namespace App\Http\Resources;

use App\Models\ProgramDetail;
use App\Models\Project;
use Illuminate\Http\Resources\Json\Resource;

class ProgramResource extends Resource
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
            'program_category_id'=>$this->program_category_id,
            'name'=> $this->name,
            'description' => $this->description,
            'details' => ProgramDetail::where('program_id', $this->id)->get()[0],
            'allocated_budget' => Project::join('project_details', 'project_details.project_id','=','projects.id')
                                            ->select('project_details.budget')
                                            ->where('projects.program_id', $this->id)
                                            ->sum('project_details.budget')
        ];
    }
}
