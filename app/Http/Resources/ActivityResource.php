<?php

namespace App\Http\Resources;

use App\ActivityInput;
use App\ActivityList;
use App\Output;
use App\OutputActivity;
use Illuminate\Http\Resources\Json\Resource;

class ActivityResource extends Resource
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
            'activity_list' => ActivityList::where('activity_id', $this->id)->get(),
            'output' => OutputActivity::join('outputs','outputs.id','=','output_activities.output_id')
                        ->where(['output_activities.activity_id' => $this->id, 'output_activities.activity_type' => 'Activity' ])->get(),
            'input' => ActivityInput::join('inputs','inputs.id','=','activity_inputs.input_id')
                ->where(['activity_inputs.activity_id' => $this->id, 'activity_inputs.activity_type' => 'Activity' ])->get()
        ];
    }
}
