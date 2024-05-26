<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isEmpty;

class UserResource extends JsonResource
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
            'name'=>$this->info->name ?? '未知',
            'storename'=>$this->info->storecodeName ?? "未到对应的手机号，请联系管理。"
        ];

    }
}
