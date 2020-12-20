<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    private $categories;
    public function __construct(){
        $this->categories = DB::table('productcategory')->get();
    }
    public function getIndex(){
        return view('user.index')->with(array('categories'=> $this->categories));
    }

    public function getBlog(){
        return view('user.blog')->with(array('categories'=> $this->categories));
    }

    public function browseProduct(){
        return view('user.browse')->with(array('categories'=> $this->categories));
    }

}
