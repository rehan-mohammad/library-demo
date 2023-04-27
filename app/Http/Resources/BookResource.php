<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'is_available' => (string) $this->is_available,
            'user_id' => (string) $this->user_id,
            'library_id' => (string) $this->library_id
        ];
    }
}
