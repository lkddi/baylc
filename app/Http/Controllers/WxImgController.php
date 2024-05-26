<?php

namespace App\Http\Controllers;

use App\Http\Requests\WxImgRequest;
use App\Http\Resources\WxImg1Resource;
use App\Http\Resources\WxImgResource;
use App\Http\Resources\WxUserResource;
use App\Models\WxGroup;
use App\Models\WxImg;
use App\Models\WxSale;
use App\Models\ZtProduct;
use App\Models\ZtStore;
use App\Servers\Server;
use App\Servers\WxUserServer;
use App\Wechats\VlwApiServer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WxImgController extends Controller
{
    public function index()
    {

        return WxImg1Resource::collection(WxImg::where('state', 0)->paginate(16));
    }


    public function show($id): JsonResponse
    {
        $img = WxImg::find($id);
        if ($img) {
            if ($img->state == 1) {
                return $this->success('操作失败', '已经登记过了！');
            } else {
                $user = qUser($img->from_wxid, $img->from_group);
                $img->user = $user;
                return $this->success(data: new WxImgResource($img), code: 1);
            }
        } else {
            return $this->success('操作失败', '记录不存在！');

        }
    }


    public function info()
    {
        return $this->success(data: new WxUserResource(Auth::user()));
    }


    /**
     * @param WxImgRequest $request
     * @return JsonResponse
     */
    public function store(WxImgRequest $request)
    {
        $id = $request->get('id');
        $p = $request->get('students');
        $store = $request->get('store');
        $user = $request->get('user');
        $s = ZtStore::where('code',$store)->first();

        if ($id && count($p) > 0 && $store && $s) {
            $wxImg = WxImg::find($id);
            if ($wxImg) {
                if (!$wxImg->state) {
                    foreach ($p as $item) {
                        $p = ZtProduct::where('title', $item['model'])->first();
                        $wxSale = new WxSale();
                        $wxSale->model = $p->title;
                        $wxSale->zt_product_id = $p->id;
                        $wxSale->zt_store_id = $s->id;
                        $wxSale->zt_store_code = $store;
                        $wxSale->quantity = 1;
                        $wxSale->amount = $item['num'];
                        $wxSale->price = $p->price;
                        $wxSale->from_group = $wxImg->from_group;
                        $wxSale->from_wxid = $user ?? '';
                        $wxSale->user = $wxImg->from_wxid;
                        $wxSale->wx_img_id = $wxImg->id;
                        $wxSale->save();
                        $wxImg->update(['state' => 1]);
                        //操作库存
                        $group = WxGroup::where('wxid', $wxImg->from_group)->first();
                        if ($group && $group['kucun']) {
                            Server::reduceStore($store, $p->id, 1);
                        }
                        //发送消息  to ddm5432
                        if (checkGroupSend($wxImg->from_group)){
                            $msg = $s->title .'销售'.$p->title .'提成'.$item['num'].'元';
                            VlwApiServer::SendTextMsg('wxid_pruy5b5gm0bg12','dd23com',$msg);
                        }
                    }
                    $user = qUser($wxImg->from_wxid, $wxImg->from_group);
                    WxUserServer::updateUser($user, $wxImg->from_group);
                    return $this->success(data: '操作成功', code: 1);
                } else {
                    return $this->success(data: '已经登记过了');
                }
            } else {
                return $this->success(data: '数据不存在!');
            }
        } else {
            return $this->success(data: '提交数据不完整');

        }
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
