<?php

namespace App\Http\Resources;

use App\Models\WxUser;
use Illuminate\Http\Resources\Json\JsonResource;

class WxImgResource extends JsonResource
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
            'from_group_name' => $this->from_group_name,
            'group_wxid' => $this->from_group,
            'from_name' => $this->from_name,
//            'img' => str_ireplace('bot.ay.lc','bot.ay.lc:8080',$this->img).'?imageView2/1/w/400/interlace/1',
            'img' => str_ireplace('http://bot.ay.lc','https://bot.ay.lc:8443',$this->img),
//            'img' => $this->img,
            'store_id' => $this->user->zt_store_code == '0' ? false : $this->user->zt_store_code,
            'store_name' => $this->user->store->name ?? false,
            'state' => $this->state,
            'avatar' => $this->user->avatar
        ];
    }
}
