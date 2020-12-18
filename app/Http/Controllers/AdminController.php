<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class AdminController extends Controller
{
    // Master
    function index(){
        return view('admin.layouts.layout');
    }
    // Category
    function categoryIndex(){
        $categories = DB::table('productcategory')->get();
        return view('admin.category', compact('categories'));
    }
    function createCategory(Request $request){
        $result = DB::table('productcategory')->insert(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/category'));
    }
    function readCategory(){
        $result = DB::table('productcategory')->paginate(10);
        return $result;
    }
    function readSingleCategory(Request $request){
        $result = DB::table('productcategory')->where('CategoryID', '=', $request->id)->get();
        return $result;
    }
    function updateCategory(Request $request){
        $result = DB::table('productcategory')->where('CategoryID', $request->CategoryID)->update(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/category'));
    }
    function deleteCategory(Request $request){
        $result = DB::table('productcategory')->get();
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/category'));
    }
    // Upload function
    public function uploadProductDescription(Request $request){
        $request->upload->move(public_path('uploads'), $request->file('upload')->getClientOriginalName());
        echo json_encode(array('file_name' => $request->file('upload')->getClientOriginalName()));
    }
}
