<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Log;

class TodoResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
     public function toArray($request)
    {
        // return parent::toArray($request);
        Log::info('toArray TodoResourceCollection');
        return [
            'data' => $this->collection,
          
        ];        
    }
}
