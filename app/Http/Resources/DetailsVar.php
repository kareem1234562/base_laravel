<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailsVar extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
     return [
        'id' => $this->id,
        'detail1'=>$this->detail1,
        'detail2'=>$this->detail2,
        'detail3'=>$this->detail3,
     ];
    }
}
