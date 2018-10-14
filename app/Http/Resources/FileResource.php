<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Storage;

class FileResource extends Resource
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
            'tag' => $this->tag,
            'file_path' => Storage::url($this->file_path),
            'is_activity_file' => $this->is_activity_file,
            'created_at' => $this->created_at,
            'user' => User::find($this->user_id)
        ];
    }
}
