<?php

namespace App\Http\Controllers;

use App\Http\Requests\HuangGroupRequest;
use App\Http\Requests\WxImgRequest;
use App\Http\Resources\HuangGroupResource;
use App\Http\Resources\WxImg1Resource;
use App\Http\Resources\WxImgResource;
use App\Http\Resources\WxUserResource;
use App\Models\HuangGroup;
use App\Models\HuangTarget;
use App\Models\WxGroup;
use App\Models\WxImg;
use App\Models\WxSale;
use App\Models\ZtProduct;
use App\Models\ZtStore;
use App\Servers\Server;
use App\Servers\WxUserServer;
use App\Wechats\VlwApiServer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HuangGroupController extends Controller
{
    public function index()
    {
        return HuangGroupResource::collection(HuangGroup::where('state', 0)->get());
    }


    public function show($id): JsonResponse
    {
        $pao = HuangGroup::find($id);
        if ($pao) {
            if ($pao->state == 1) {
                return $this->success('操作失败', '已经登记过了！');
            } else {
//                $user = qUser($pao->from_wxid, $pao->from_group);
//                $pao->user = $user;
                return $this->success(data: new HuangGroupResource($pao), code: 1);
            }
        } else {
            return $this->success('操作失败', '记录不存在！');

        }
    }


    public function info()
    {
        return $this->success(data: new HuangGroupResource(Auth::user()));
    }


    /**
     * @param WxImgRequest $request
     * @return JsonResponse
     */
    public function store(HuangGroupRequest $request)
    {
        $id = $request->get('id');
        $num = $request->get('num');
        $data['from_group'] = '17905953915@chatroom	';
        $pao = HuangGroup::find($id);
        if ($pao) {
            $pao->update(['state' => 1, 'num' => $num]);
        }
        $dd = Carbon::now();
        $target = HuangTarget::where('wxid', $pao->wxid)
            ->where('startdate','<=',$dd)
            ->where('stopdate','>=',$dd)
            ->first();
        if ($target) {
            $target->increment('actual', $num);
            $target->increment('count');
            $target->wxid = $pao->wxid;
            $target->save();
        } else {
            $target = new HuangTarget();
            $target->startdate = $dd->startOfWeek();
            $target->stopdate = $dd->endOfWeek();
            $target->actual = $num;
            $target->wxid = $pao->wxid;
            $target->count = 1;
            $target->target = 0;
            $target->state = 0;
            $target->save();
        }
        //发送消息  to ddm5432

        $runnum = $target->target - $target->actual;
        if ($runnum<0){
            $m = '。';
        }else{
            $m = '，距离目标:'.$runnum.'公里';
        }
        $msg = findWxUserName($pao->wxid, $data['from_group']) . ':今日跑步:' . $num . '公里，本周累计跑步:' . $target->actual . '公里'.$m;
        VlwApiServer::SendTextMsg('wxid_pruy5b5gm0bg12', 'dd23com', $msg);
        return $this->success(data: '操作成功', code: 1);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $sale = WxImg::find($id)->delete();
        return $this->success(data: '操作成功', code: $sale);
    }
}
