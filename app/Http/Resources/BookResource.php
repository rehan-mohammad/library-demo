<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the book resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->author,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_available' => $this->is_available,
            'user_id' => $this->user_id,
            'library_id' => $this->library_id
        ];
    }
}
