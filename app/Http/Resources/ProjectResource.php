<?php

namespace App\Http\Resources;

use App\Models\Outcome;
use App\Models\Program;
use App\Models\ProjectBeneficiary;
use App\Models\ProjectCategory;
use App\Models\ProjectDetail;
use App\Models\ProjectImplementer;
use App\Models\Status;
use App\Models\Project;
use App\Models\File;
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
            'program' => Program::find($this->program_id),
            'category' => ProjectCategory::find($this->project_category_id),
            'name' => $this->name,
            'description' => $this->description,
            'featured' => $this->featured,
            'status' => Status::find($this->status_id),
            'details' => new ProjectDetailResource(ProjectDetail::where('project_id', $this->id)->get()[0]),
            'beneficiary' => ProjectBeneficiaryResource::collection(ProjectBeneficiary::where('project_id', $this->id)->get()),
            'implementer' => ProjectImplementerResource::collection(ProjectImplementer::where('project_id', $this->id)->get()),
            'outcomes' => Outcome::where(['project_id' => $this->id, 'parent_id' => 0])->get(),
            'activities' => self::getProjectActivities($this->id),
            'files' => FileResource::collection(File::where(['is_activity_file' => 0, 'parent_id' => $this->id])->get()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
    private function getProjectActivities($project_id) {
        $activities = Project::join('outcomes', 'outcomes.project_id', '=', 'projects.id')
                                ->join('outputs', 'outputs.outcome_id', '=', 'outcomes.id')
                                ->join('activities', 'activities.output_id', '=', 'outputs.id')
                                ->select(['activities.id', 'activities.name', 'activities.output_id',
                                    'activities.description', 'activities.featured', 'activities.status_id',
                                    'activities.activity_category_id', 'activities.kebele_id',
                                    'activities.baseline', 'activities.target', 'activities.start_date',
                                    'activities.end_date', 'activities.implementing_partners', 'activities.parent_id',
                                    'activities.created_at', 'activities.updated_at', 'activities.deleted_at'])
                                ->where(['projects.id' => $project_id, 'activities.featured' => 1])->get();
        return ActivityResource::collection($activities);
    }
}
