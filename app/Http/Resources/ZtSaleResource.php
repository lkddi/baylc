<?php

namespace App\Http\Resources;

use App\Models\ZtGati;
use App\Models\ZtReward;
use Illuminate\Http\Resources\Json\JsonResource;

class ZtSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $gati = ZtGati::where('model',$this->model)
            ->where('starttime','<=',date("Y-m-d h:i:s",$this->purMachineTime/1000))
            ->where('endtime','>=',date("Y-m-d h:i:s",$this->purMachineTime/1000))
            ->where('state',1)
            ->first();
        $reward = ZtReward::where('state',1)->where('model',$this->model)
            ->where('starttime','<=',date("Y-m-d h:i:s",$this->purMachineTime/1000))
            ->where('endtime','>=',date("Y-m-d h:i:s",$this->purMachineTime/1000))
            ->first();

        return [
            'model'=>$this->model,
            'price'=>$this->proposeRetailPrice,
            'gati'=>$gati->gati ?? 0,
            'percentage'=>$gati->percentage ?? 0,
            'reward'=>$reward->reward ?? 0,
            'date'=>date("Y-m-d",$this->purMachineTime/1000),
//            'date'=>$this->purMachineTime,

        ];
    }
}
