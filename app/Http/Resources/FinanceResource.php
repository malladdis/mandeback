<?php

namespace App\Http\Resources;

use App\Models\FinancePlan;
use Illuminate\Http\Resources\Json\Resource;

class FinanceResource extends Resource
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
            'project_id' => $this->project_id,
            'frequency_id' => $this->frequency_id,
            'plans' => FinancePlanResource::collection(FinancePlan::where('finance_id', $this->id)->get())
        ];
    }
}
