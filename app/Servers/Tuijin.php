<?php

namespace App\Servers;

use App\Models\WxGroup;
use App\Models\WxSalestarget;
use App\Models\ZtRetail;
use App\Models\ZtSale;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Tuijin
{
    //推进查询
    public static function getStartget($starttime, $stoptime)
    {
        $stores = WxSalestarget::where('state', 1)->get();
//        $stores = $stores->code->toarray();
        $p = [];
        $zong =0;
        foreach ($stores as $key => $store) {
            $data = ZtSale::where('ownerShopCode', $store->code)
                ->where('brandName', '松下')
                ->where('purMachineTime', '>=', strtotime($starttime)*1000)
                ->where('purMachineTime', '<=', strtotime($stoptime)*1000)
                ->get();
            $jine = $data->sum(function ($item) {
                return $item['proposeRetailPrice'];
            });
            $p[$key]['name'] = $store->store->title;
            $p[$key]['targets'] = $store->targets;
            $p[$key]['actual'] = $jine;//   实际销售
            $p[$key]['qun'] = round($jine / $store->targets* 100, 2). '%';//完成率
            $zong = $zong+ $jine;
        }
        array_multisort(array_column($p, 'actual'), SORT_DESC, $p);
        $s = count($p);
        $targets = $stores->sum(function ($item) {
            return $item['targets'];
        });
        $p[$s]['name'] = '合计';
        $p[$s]['targets'] = $targets;
        $p[$s]['actual'] = $zong;
        $p[$s]['qun'] = $zong != 0 ? ($zong / $targets ? round($zong / $targets * 100, 2) . '%' : '-') : '-';

//        $group = ZtRetail::where('code', $retailCode)->first();
//        Log::info($group);
        $title = '销售推进(618活动)';
        $table = ['序号', '门店', '任务', '实际', '推进率', '-', '-'];
        $e = CreateTable::create_table($p, $title, 'tuijin/', $table);
        $url = 'http://b.ay.lc/' . $e;
        return $url;
    }

    public static function getTuijin($retailCode, $month)
    {

        $p = [];
        $n_year = date("Y", time());
        $y_year = $n_year - 1;
        $data = ZtSale::whereRelation('store', 'advance', 1)
            ->where(checkQuyu($retailCode), $retailCode)
            ->where('brandName', '松下')
            ->where('purMachineYear', $n_year)
            ->where('purMachineMonth', $month)
            ->get();
        //本月数据
        //本月数据
        $a['store'] = $data->groupBy('store.title')->map(function ($item) {
            return $item->count('price');
        })->toArray();
        $a['amount'] = $data->groupBy('store.title')->map(function ($item) {
            return $item->sum('amount');
        })->toArray();
        $a['proposeRetailPrice'] = $data->groupBy('store.title')->map(function ($item) {
            return $item->sum('proposeRetailPrice');
        })->toArray();
        $benyuet = $data->sum(function ($item) {
            return $item['amount'];
        });
        $benyuejine = $data->sum(function ($item) {
            return $item['proposeRetailPrice'] ?? 0;

        });

        //同期数据
        $tongqi = ZtSale::where(checkQuyu($retailCode), $retailCode)
            ->where('brandName', '松下')
            ->where('purMachineYear', $y_year)
            ->where('purMachineMonth', $month)
            ->whereRelation('store', 'advance', 1)
            ->get();
        $b['amount'] = $tongqi->groupBy('store.title')->map(function ($item) {
            return $item->sum('amount');
        })->toArray();
        $b['proposeRetailPrice'] = $tongqi->groupBy('store.title')->map(function ($item) {
            return $item->sum('proposeRetailPrice');
        })->toArray();
        $tongqijine = $tongqi->sum(function ($item) {
            return $item['proposeRetailPrice'] ?? 0;
        });

        //累计数据
        $leiji = ZtSale::where(checkQuyu($retailCode), $retailCode)
            ->where('brandName', '松下')
            ->where('purMachineYear', $n_year)
            ->whereRelation('store', 'advance', 1)
            ->where('purMachineMonth', '<=', $month)
            ->get();

        $leiji['store'] = $tongqi->groupBy('store.title')->map(function ($item) {
            return $item->count('price');
        })->toArray();
        $c['proposeRetailPrice'] = $leiji->groupBy('store.title')->map(function ($item) {
            return $item->sum('proposeRetailPrice');
        })->toArray();
        $c['amount'] = $leiji->groupBy('store.title')->map(function ($item) {
            return $item->sum('amount');
        })->toArray();

        $leijijine = $leiji->sum(function ($item) {
            return $item['proposeRetailPrice'] ?? 0;
        });


        $store1 = array_keys($leiji['store']);
        $store2 = array_keys($a['store']);
        $stores = array_keys(array_flip($store1) + array_flip($store2));

        foreach ($stores as $key => $store) {
            $jinnt = $a['amount'][$store] ?? 0;
            $jinn = $a['proposeRetailPrice'][$store] ?? 0;
//        $qunt = $b['amount'][$store]?? 0;
            $qun = $b['proposeRetailPrice'][$store] ?? 0;
            $leiji = $c['proposeRetailPrice'][$store] ?? 0;
            if ($qun) {
                $qunb = $jinn / $qun ? round($jinn / $qun * 100, 2) . '%' : '-';
            } else {
                $qunb = '-';
            }
            $p[$key]['name'] = $store;
            $p[$key]['jinn'] = $jinnt;
            $p[$key]['jinnt'] = $jinn;
            $p[$key]['qun'] = $qun;
            $p[$key]['qunb'] = $qunb;
            $p[$key]['leiji'] = $leiji;
        }
        array_multisort(array_column($p, 'jinn'), SORT_DESC, array_column($p, 'leiji'), SORT_DESC, $p);
        $s = count($p);
        $p[$s]['name'] = '合计';
        $p[$s]['jinnt'] = $benyuet;
        $p[$s]['jinn'] = $benyuejine;
        $p[$s]['qun'] = $tongqijine;
        $p[$s]['qunb'] = $tongqijine != 0 ? ($benyuejine / $tongqijine ? round($benyuejine / $tongqijine * 100, 2) . '%' : '-') : '-';
        $p[$s]['leiji'] = $leijijine;

//        $group = ZtRetail::where('code', $retailCode)->first();
//        Log::info($group);
        $title = '销售推进(截止到:' . $n_year . '年' . $month . '月)';
        $table = ['序号', '门店', '台量', '本月金额', '同期金额', '去年比', '累计金额'];
        $e = CreateTable::create_table($p, $title, 'tuijin/', $table);
        $url = 'http://b.ay.lc/' . $e;
        return $url;
    }

    public static function getTuijinNow($retailCode)
    {
        $month = date("m", time());
        $day = date("d", time());
        $n_year = date("Y", time());
        $y_year = $n_year - 1;
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        $data = ZtSale::where('salesDeptCode', $retailCode)
            ->where('purMachineYear', $y_year)
            ->where('purMachineMonth', $month)
            ->whereRelation('store', 'advance', 1)
            ->get();
        //本月数据
        $a['store'] = $data->groupBy('store.title')->map(function ($item) {
            return $item->count('price');
        })->toArray();
        dd($a);

        $a['amount'] = $data->groupBy('store.title')->map(function ($item) {
            return $item->sum('amount');
        })->toArray();
        $a['proposeRetailPrice'] = $data->groupBy('store.title')->map(function ($item) {
            return $item->sum('proposeRetailPrice');
        })->toArray();
        $benyuet = $data->sum(function ($item) {
            return $item['amount'];
        });
        $benyuejine = $data->sum(function ($item) {
            return $item['proposeRetailPrice'] ?? 0;

        });

        //今天数据
        //php获取今日开始时间戳和结束时间戳
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $tongqi = ZtSale::where('salesDeptCode', $retailCode)
            ->where('purMachineTime', '>=', $beginToday * 1000)
//            ->where('purMachineMonth', $month)
            ->whereRelation('store', 'advance', 1)
            ->get();
        $b['amount'] = $tongqi->groupBy('store.title')->map(function ($item) {
            return $item->sum('amount');
        })->toArray();
        $b['proposeRetailPrice'] = $tongqi->groupBy('store.title')->map(function ($item) {
            return $item->sum('proposeRetailPrice');
        })->toArray();
        $tongqijine = $tongqi->sum(function ($item) {
            return $item['proposeRetailPrice'] ?? 0;
        });

        //累计数据
        $leiji = ZtSale::where('salesDeptCode', $retailCode)
            ->where('purMachineYear', $n_year)
            ->whereRelation('store', 'advance', 1)
            ->where('purMachineMonth', '<=', $month)
            ->get();

        $leiji['store'] = $tongqi->groupBy('store.title')->map(function ($item) {
            return $item->count('price');
        })->toArray();
        $c['proposeRetailPrice'] = $leiji->groupBy('store.title')->map(function ($item) {
            return $item->sum('proposeRetailPrice');
        })->toArray();
        $c['amount'] = $leiji->groupBy('store.title')->map(function ($item) {
            return $item->sum('amount');
        })->toArray();

        $leijijine = $leiji->sum(function ($item) {
            return $item['proposeRetailPrice'] ?? 0;
        });


        $store1 = array_keys($leiji['store']);
        $store2 = array_keys($a['store']);
        $stores = array_keys(array_flip($store1) + array_flip($store2));
        foreach ($stores as $key => $store) {
            $jinnt = $a['amount'][$store] ?? 0;
            $jinn = $a['proposeRetailPrice'][$store] ?? 0;
//        $qunt = $b['amount'][$store]?? 0;
            $qun = $b['proposeRetailPrice'][$store] ?? 0;
            $leiji = $c['proposeRetailPrice'][$store] ?? 0;
            if ($qun) {
                $qunb = $jinn / $qun ? round($jinn / $qun * 100, 2) . '%' : '-';
            } else {
                $qunb = '-';
            }
            $p[$key]['name'] = $store;
            $p[$key]['jinn'] = $jinnt;
            $p[$key]['jinnt'] = $jinn;
            $p[$key]['qun'] = $qun;
            $p[$key]['qunb'] = $qunb;
            $p[$key]['leiji'] = $leiji;
        }
        array_multisort(array_column($p, 'jinn'), SORT_DESC, array_column($p, 'leiji'), SORT_DESC, $p);
        $s = count($p);
        $p[$s]['name'] = '合计';
        $p[$s]['jinnt'] = $benyuet;
        $p[$s]['jinn'] = $benyuejine;
        $p[$s]['qun'] = $tongqijine;
        $p[$s]['qunb'] = $benyuejine / $tongqijine ? round($benyuejine / $tongqijine * 100, 2) . '%' : '-';
        $p[$s]['leiji'] = $leijijine;

        $group = ZtRetail::where('code', $retailCode)->first();
//        Log::info($group);
        $title = $group['title'] . '-销售推进(截止到:' . $n_year . '年' . $month . '月)';
        $table = ['序号', '门店', '台量', '本月金额', '同期金额', '去年比', '累计金额'];

        $e = CreateTable::create_table($p, $title, 'tuijin/', $table);
        $url = 'http://b.ay.lc/' . $e;
        return $url;
    }
}
