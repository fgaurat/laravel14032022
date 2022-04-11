<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        
        Log::info('toArray TodoResource');

        return [
            'id'=> $this->id,
            'content'=> $this->content,
            'done'=> $this->done,
            'tags' => TagResource::collection($this->tags),
            'due_date'=> $this->due_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at            
        ];
    }
}
