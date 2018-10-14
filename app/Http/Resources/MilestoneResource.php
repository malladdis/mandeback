<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MilestoneResource extends Resource
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
            'start' => $this->start,
            'end' => $this->end,
            'baseline' => $this->baseline,
            'target' => $this->target,
            'actual' => self::getTotalActual($this->id),
            'budget' => $this->budget,
            'percentComplete' => self::getPercentComplete($this->id, $this->target)
        ];
    }
    private function getPercentComplete($milestone_id, $target) {
        return \App\Models\MilestoneActualValue::where('milestone_id', $milestone_id)->sum('value')/$target;
    }
    private function getTotalActual($milestone_id) {
        return \App\Models\MilestoneActualValue::where('milestone_id', $milestone_id)->sum('value');
    }
}
