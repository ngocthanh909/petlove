<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;
class UserController extends Controller

{   
    public function __construct(){
    
        View::share('categories', $this->createNested($this->masterIndex(), 0));

    }
    function createNested($categories, $parentId = 0)
    {
        $results = [];
        foreach ($categories as $category) {
            if ($parentId == $category->ParentID) {
                $nextParentId = $category->CategoryID;
                $category->children = $this->createNested($categories, $nextParentId);
                $results[] = $category;
            }
        }
        return $results;
    }

    
    public function getIndex(){
        $categories = DB::table('productcategory')->get();
        return view('user.index',compact('categories'));
    }
    function index(){
        return view('user.index');
    }
    public function masterIndex(){
        $categories = DB::table('productcategory')->get();
        return ($categories);
    }
    public function getProduct($tensanpham){

        $product = DB::table('product')->where('Slug', $tensanpham)->first();
        $brand = DB::table('brand')->where('BrandID', $product->BrandID)->first();
        return view('user.product')->with(array('product' => $product , 'brand' => $brand->Name ));
    }
    public function getBlog(){
        return view('user.blog');
    }
    public function getAbout(){
        return view('user.about');
    }
    public function getCarts(){
        return view('user.carts');
    }

    public function profileSettings(){
        return view('user.account.profile');
    }

    public function profileFavorite(){
        return view('user.account.favorite');
    }


    private $parentCategories = "";

    function findParentCategories($id){
        if ($id != 0){
            $category = DB::table('productcategory')->where('CategoryID', $id)->first();
            $this->parentCategories .= $category->Slug . "|" . $category->Name . "/";
            $this->findParentCategories($category->ParentID);
        }

    }
    public function getCollection($tendanhmuc){
        $categories = DB::table('productcategory')->get();
        foreach($categories as $category){
            if ($category->Slug == $tendanhmuc){
                $test = $this->findParentCategories( $category->CategoryID);
                break;
            }
        }

        $categoriesArr = explode("/",$this->parentCategories);
        return view('user.collection')->with(array('categories'=> $categories , 'tendanhmuc' => $tendanhmuc , 'categoriesArr' => $categoriesArr));
    }

    public function profileDelivery(){
        return view('user.account.delivery');
    }
}
