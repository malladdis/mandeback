<?php

namespace App\Http\Resources;

use App\Models\ExpenditureCategory;
use App\Models\MonthlyExpenditure;
use Illuminate\Http\Resources\Json\Resource;

class ExpenditureResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'finance_plan_id' => $this->finance_plan_id,
            'category' => ExpenditureCategory::find($this->expenditure_category_id),
            'total' => self::getTotal(MonthlyExpenditure::where('expenditure_id', $this->id)->get()[0]['values'])
        ];
    }

    public function getTotal($values) {
        $datas = json_decode($values);
        $total = 0;
        foreach ($datas as $key => $val) {
            $total += $val;
        }
        return $total;
    }
}
