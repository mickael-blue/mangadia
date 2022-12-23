<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BattleResource extends JsonResource
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
            'character1' => new CharacterResource($this->character1),
            'character2' => new CharacterResource($this->character2),
            'vote_1' => $this->vote_1,
            'vote_2' => $this->vote_2,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ];
    }
}
