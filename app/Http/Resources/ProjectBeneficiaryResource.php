<?php

namespace App\Http\Resources;

use App\Models\Beneficiary;
use Illuminate\Http\Resources\Json\Resource;

class ProjectBeneficiaryResource extends Resource
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
            'groups' => Beneficiary::find($this->beneficiary_id)
        ];
    }
}
