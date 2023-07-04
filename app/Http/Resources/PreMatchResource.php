<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PreMatchResource extends JsonResource
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
            'away_team' => $this->awayteam->name,
            'city' => $this->city,
            'competition' => $this->tournament->name,
            'home_team' => $this->hometeam->name,
            'kick_off_time' => $this->kick_off_time,
            'match_commissionar' => $this->official_assistant,
            'match_date' => $this->date,
            'match_number' => $this->id,
            'stadium' => $this->stadium->name,
            'away_team_photo' => $this->awayteam->team_photo,
            'home_team_photo' => $this->awayteam->team_photo,
        ];
    }
}
