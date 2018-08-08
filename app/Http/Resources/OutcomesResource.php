<?php

namespace App\Http\Resources;

use App\Models\Outcome;
use App\Models\OutcomeIndicator;
use App\Models\Output;
use Illuminate\Http\Resources\Json\Resource;

class OutcomesResource extends Resource
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
            'outputs' => Output::where('outcome_id', $this->id)->get(),
            'indicators' => OutcomeIndicator::join('outcomes', 'outcomes.id', '=', 'outcome_indicators.outcome_id')
                ->join('indicators', 'indicators.id','=','outcome_indicators.indicator_id')
                ->select(['indicators.id','indicators.name','indicators.description'])
                ->where('outcomes.id',$this->id)->get()
        ];
    }
}
