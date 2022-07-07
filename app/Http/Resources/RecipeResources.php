<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResources extends JsonResource
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
            'name' => $this->name,
            'servings' => $this->servings,
            'quantity' => $this->quantity,
            'energy' => $this->energy,
            'slug' => $this->slug,
            'nutrition' => [
                'protein' => $this->nutrition->protein,
                'fat' => $this->nutrition->fat,
                'carb' => $this->nutrition->carb,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
