<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WxSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
//            'mdname'=>$this->store->name,
            'nickname' => $this->store->name ??$this->store->nickname,
            'model' =>  $this->product->model,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
        ];
    }
}
