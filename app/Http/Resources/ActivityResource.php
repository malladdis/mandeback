<?php

namespace App\Http\Resources;

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\ActivityIndicator;
use App\Models\Kebele;
use App\Models\Status;
use App\Models\Output;
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
            'output' => Output::where('id', $this->output_id)->get(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => Status::where('id', $this->status_id)->get(),
            'category' => ActivityCategory::where('id', $this->activity_category_id)->get(),
            'kebele' => Kebele::where('id', $this->kebele_id)->get(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'implementing_partners' => $this->implementing_partners,
            'activities' => Activity::where('parent_id', $this->id)->get(),
            'indicators' => ActivityIndicator::join('activities', 'activities.id', '=', 'activity_indicators.activity_id')
                ->join('indicators', 'indicators.id','=','activity_indicators.indicator_id')
                ->select(['indicators.id','indicators.name','indicators.description'])
                ->where('activities.id', $this->id)->get(),
        ];
    }
}
