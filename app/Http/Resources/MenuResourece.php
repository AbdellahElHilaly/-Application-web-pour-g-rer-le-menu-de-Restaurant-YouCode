<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResourece extends JsonResource
{
    public function toArray($request)
    {

        return [
            "data 1" => $this->id,
            "data 2" => $this->name,
            "data 3" => $this->price,
        ];

    }
}


