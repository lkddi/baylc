<?php

namespace App\Http\Controllers;

use App\Http\Requests\WxSaleRequest;
use App\Models\WxGroup;
use App\Models\WxImg;
use App\Models\WxSale;
use App\Models\WxUser;
use App\Models\ZtProduct;
use App\Models\ZtStore;
use App\Servers\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AddSaleController extends Controller
{
    //添加销售

    public function index($id)
    {
        $img = WxImg::find($id);
        if ($img && !$img->state){
            $user = WxUser::where('group_wxid',$img->from_group)
                ->where('wxid',$img->from_wxid)
                ->first();
            if ($user){
                $stores = [];
                if (!$user->zt_store_code){
                    $stores = ZtStore::all();
                }
                return view('AddSale',compact('img','user','stores'));
            }else{
                $e = '用户为设置门店，请先去设置对应门店！';
            }
        }else{
            $e = '该发票不存在或已经登记！';
            return view('e',compact('e'));
        }
    }

    public function save(WxImg $wxImg,WxSaleRequest $request)
    {
        $p = Server::findmodel($request->get('model'));
        if ($p){
            $wxSale = new WxSale();
            $wxSale->zt_product_id = $p;
            $wxSale->model = $request->get('model');
            $wxSale->zt_store_code = $request->get('store_id');
            $wxSale->quantity = 1;
            $wxSale->amount = $request->get('ticheng');
            $wxSale->from_group = $wxImg->from_group;
            $wxSale->from_wxid = $wxImg->from_wxid;
            $wxSale->user = $wxImg->user_id;
            $wxSale->wx_img_id = $wxImg->id;
            $wxSale->save();

            $wxImg->update(['state'=>1]);

            //操作库存
            $group = WxGroup::where('wxid',$wxImg->from_group)->first();
            if ($group && $group['kucun']){
                Server::reduceStore($request->get('store_id'),$p,1);
            }

            return redirect()->route('showsale', $wxSale->id)->with('success', '销售记录成功！');
        }
    }

    public function show($id)
    {
        $sale = WxSale::find($id);
        return view('ShowSale',compact('sale'));
    }

    public function upstate($id,Request $request)
    {
        Log::info($id);
        Log::info($request->all());
        $info=['status'=>0,'message'=>'添加失败'];
        $store_id = $request->get('store');
        if (isset($store_id)){
            $user = WxUser::find($id);
            if ($user){
                $user->zt_store_code = $store_id;
                $user->save();
                $info=['status'=>1,'message'=>'添加成功'];
            }
        }
        return $info;//返回信息：这里laravel框架会自动返回为json数据
    }

}
