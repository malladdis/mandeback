<?php

namespace App\Http\Resources;

use App\Models\Expenditure;
use Illuminate\Http\Resources\Json\Resource;

class ExpenditureCategoryResource extends Resource
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
            'expenditures' => ExpenditureResource::collection(Expenditure::where('expenditure_category_id', $this->id)->get())

        ];
    }
}
