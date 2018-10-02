<?php

namespace App\Http\Resources;

use App\Models\Expenditure;
use Illuminate\Http\Resources\Json\Resource;

class FinancePlansResource extends Resource
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
            'finance_id' => $this->finance_id,
            'name' => $this->name,
            'value' => $this->value,
            'expenditures' => ExpenditureResource::collection(Expenditure::where('finance_plan_id', $this->id)->get())
        ];
    }
}
