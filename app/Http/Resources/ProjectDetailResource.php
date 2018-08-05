<?php

namespace App\Http\Resources;

use App\Models\Cluster;
use App\User;
use Illuminate\Http\Resources\Json\Resource;

class ProjectDetailResource extends Resource
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
            'cluster' => Cluster::find($this->cluster_id),
            'budget' => $this->budget,
            'goal' => $this->goal,
            'objective' => $this->objective,
            'manager1' => User::find($this->mng_1),
            'manager2' => User::find($this->mng_2),
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
