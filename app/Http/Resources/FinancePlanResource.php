<?php

namespace App\Http\Resources;

use App\Models\Expenditure;
use Illuminate\Http\Resources\Json\Resource;

class FinancePlanResource extends Resource
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
            'start' => $this->start,
            'expenditures' => Expenditure::Join('expenditure_categories','expenditure_categories.id','=','expenditures.expenditure_category_id')
                ->join('monthly_expenditures','monthly_expenditures.expenditure_id','=','expenditures.id')
                ->select(['expenditure_categories.name','expenditure_categories.id','expenditures.name as expense','expenditures.id as exp_id', 'monthly_expenditures.values'])
                ->where('expenditures.finance_plan_id', $this->id)->get()->groupBy('name'),
        ];
    }
}
