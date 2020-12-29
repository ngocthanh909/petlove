<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelplerController extends Controller
{
    public static function message($code, $msg){
        session()->push('msg', ['code' => $code, 'msg' => $msg, 'time' => date('Y-m-d H:i:s')]);
    }
}
