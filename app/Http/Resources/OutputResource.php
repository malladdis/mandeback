<?php

namespace App\Http\Resources;

use App\Models\Output;
use App\Models\OutputIndicator;
use Illuminate\Http\Resources\Json\Resource;

class OutputResource extends Resource
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
            'outputs' => Output::where('parent_id', $this->id)->get(),
            'indicators' => OutputIndicator::join('outputs', 'outputs.id', '=', 'output_indicators.output_id')
                ->join('indicators', 'indicators.id','=','output_indicators.indicator_id')
                ->select(['indicators.id','indicators.name','indicators.description'])
                ->where('outputs.id', $this->id)->get()
        ];
    }
}
