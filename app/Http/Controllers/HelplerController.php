<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelplerController extends Controller
{
    public static function message($code, $msg){
        session(['code' => $code, 'msg' => $msg]);
    }
}
