<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WxUserResource extends JsonResource
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
            'id'=>$this->id,
            'wxid'=>$this->wxid,
            'name'=>$this->name!=null ? $this->name : $this->nickname,
            'group_wxid'=>$this->group_wxid,
            'avatar'=>$this->avatar,
            'group_name'=>$this->group->title,
            'nostoremsg'=>$this->nostoremsg,
            'store_id'=>$this->zt_store_code=="0" ? false : $this->zt_store_code,
            'store_name'=>$this->store->name?? null,
        ];
    }
}
