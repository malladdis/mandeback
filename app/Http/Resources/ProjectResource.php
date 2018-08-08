<?php

namespace App\Http\Resources;

use App\Models\Outcome;
use App\Models\Program;
use App\Models\ProjectBeneficiary;
use App\Models\ProjectCategory;
use App\Models\ProjectDetail;
use App\Models\ProjectImplementer;
use App\Models\Status;
use Illuminate\Http\Resources\Json\Resource;

class ProjectResource extends Resource
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
            'program' => Program::find($this->progran_id),
            'category' => ProjectCategory::find($this->project_category_id),
            'name' => $this->name,
            'description' => $this->description,
            'featured' => $this->featured,
            'status' => Status::find($this->status_id),
            'details' => new ProjectDetailResource(ProjectDetail::where('project_id', $this->id)->get()[0]),
            'beneficiary' => ProjectBeneficiaryResource::collection(ProjectBeneficiary::where('project_id', $this->id)->get()),
            'implementer' => ProjectImplementerResource::collection(ProjectImplementer::where('project_id', $this->id)->get()),
            'outcomes' => Outcome::where(['project_id' => $this->id, 'parent_id' => 0])->get(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
