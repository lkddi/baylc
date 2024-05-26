<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HuangGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'wxid' => $this->wxid,
            'name' => $this->user->name,
            'num' => $this->num,
            'photo' => '../../wxid_pruy5b5gm0bg12/'.$this->photo,
            'state' => $this->state,
            'rundate' => $this->rundate,
            'avatar' => $this->user->avatar
        ];
    }
}
