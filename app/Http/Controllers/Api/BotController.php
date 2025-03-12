<?php

namespace App\Http\Controllers\Api;

use App\Events\AddMsgEvent;
use App\Events\OfflineEvent;
use App\Http\Controllers\Controller;
use App\Models\WxBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{

    public function receive(Request $request)
    {
        $message = $request->all();
        Log::channel('gewe_daily')->info($message);

        if(!isset($message['TypeName'])){
            return response()->json(['status' => 'success']);
        }

        switch ($message['TypeName']) {
            case 'Offline': // 掉线通知
                Event::dispatch(new OfflineEvent($message));
                break;
//            case 'DelContacts':
//                Event::dispatch(new DelContactsEvent($message));
//                break;
            case 'AddMsg';
                Event::dispatch(new AddMsgEvent($message));
                break;

            default:
        }
    }
}
