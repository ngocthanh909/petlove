<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelplerController extends Controller
{
    public static function message($code, $msg){
        $temp = ['code' => $code, 'msg' => $msg, 'time' => date('Y-m-d H:i:s')];
        if(is_string(session('msg'))){
            session()->forget('msg');
            session()->push('msg', $temp);
        } else {
            session()->push('msg', $temp);
        }

    }
}
