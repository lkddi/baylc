<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class WxImg1Resource extends JsonResource
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
            'group_name'=>\Str::limit($this->from_group_name,18,'...'),
            'name'=>\Str::limit($this->from_name,12,'...'),
//            'img'=>str_ireplace('bot.ay.lc','bot.ay.lc:8080',$this->img).'?imageView2/1/w/200/h/100',
            'img'=>str_ireplace('http://bot.ay.lc','https://bot.ay.lc:8443',$this->img),
//            'img'=>$this->img,
            'date'=>Carbon::parse($this->created_at)->toDateString(),
        ];
    }
}
