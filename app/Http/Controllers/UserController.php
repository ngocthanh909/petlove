<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

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


    public function browseProduct($tendanhmuc){
        // $categorySide = "";
        // foreach($this->categories as $category){
        //     if ($category->ParentID == 0){
        //         if ($category->Slug == $tendanhmuc){
        //             $queryID = $category->CategoryID;
        //             $categorySide .= "<h5>". $category->Name ."</h5><ul>";
        //             foreach($this->categories as $subCategory){
        //                 if ($subCategory->ParentID == $queryID){
        //                     $categorySide.= '<a href'.  .'><li>'. $subCategory->Name .'</li>';
        //                 }
        //             }
        //             $categorySide .= "</ul>";
        //         }
        //     }
        // }

        return view('user.browse')->with(array('categories'=> $this->categories , 'tendanhmuc' => $tendanhmuc));
    }

    public function updateSlug(){
        foreach($this->categories as $category){
            $count = 0;
            $slug = Str::slug($category->Name, '-');
            $temp = $slug;
            echo "Input:  " . $temp . "<br>";
            while (DB::table('productcategory')->where('Slug', '=', $temp)->exists()) {
                echo "Trùng:  " . $temp . "<br>";
                $count++;
                $temp =  $slug . "-". $count;
            }
            echo "Final:  " . $temp . "<br><br>";
            DB::table('productcategory')->where('CategoryID', $category->CategoryID)->update(['Slug' => $temp]);
            
            
        }
        echo "Done";
    }

}
