<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Master
    function index(){
        return view('admin.layouts.layout');
    }
    // Category
    function categoryIndex(Request $request){
        $categories = DB::table('productcategory')->paginate(3);
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
        $result = DB::table('productcategory')->where('CategoryID', $request->CategoryID)->delete();
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/category'));
    }
    // Upload function
    public function fileUpload($request, $formvalue, $destination, $fileName){
        if ($request->hasFile($formvalue)) {
            $file = $request->file($formvalue);
            $path = $file->path();
            $extension = $file->extension();
            $fileName = $fileName . '.' . $extension;
            $patch = $file->storeAs('public/'.$destination, $fileName);
            return 'storage/'.$destination.'/'.$fileName;
        }
    }
    public function fileUpload2($request){

    }
    // Brand
    function brandIndex(Request $request){
        $brands = DB::table('brand')->paginate(10);
        return view('admin.Brand', compact('brands'));
    }
    function createBrand(Request $request){
        $result = DB::table('brand')->insert(['Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "images", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/brand'));
    }
    function readBrand(){
        $result = DB::table('brand')->get();
        return $result;
    }
    function readSingleBrand(Request $request){
        $result = DB::table('brand')->where('BrandID', '=', $request->id)->get();
        return $result;
    }
    function updateBrand(Request $request){
        if(isset($request->Avatar)){
            $result = DB::table('brand')->where('BrandID',$request->BrandID)->update(['Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "images", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        } else {
            $result = DB::table('brand')->where('BrandID',$request->BrandID)->update(['Name' => $request->Name, 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        }
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/brand'));
    }
    function deleteBrand(Request $request){
        $result = DB::table('brand')->where('BrandID', $request->BrandID)->delete();
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/brand'));
    }

        // Product
    function productIndex(Request $request){
        $products = DB::table('product')->paginate(20);
        $brands = DB::table('brand')->get();
        $categories = DB::table('productcategory')->get();
        return view('admin.product')->with('products', $products)->with('categories', $categories)->with('brands', $brands);
    }
    function createProduct(Request $request){
        $result = DB::table('product')->insert(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku, 'Price' => $request->Price, 'Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "ProductAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/product'));
    }
    function updateProduct(Request $request){
        // $result = DB::table('product')->where('ProductID', $request->ProductID)->update(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku, 'Price' => $request->Price, 'Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "ProductAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
       if(isset($request->Avatar)){
        $result = DB::table('product')->where('ProductID', '=', $request->ProductID)->update(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku, 'Price' => $request->Price, 'Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "ProductAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
       } else {
        $result = DB::table('product')->where('ProductID', $request->ProductID)->update(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku, 'Price' => $request->Price, 'Name' => $request->Name, 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        }
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/product'));
    }
    function deleteProduct(Request $request){
        $result = DB::table('product')->where('ProductID', $request->ProductID)->delete();
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/product'));
    }

    // CMS Category

    // Brand
    function cmscategoryIndex(Request $request){
        $categories = DB::table('cmscategory')->paginate(10);
        return view('admin.cmscategory', compact('categories'));
    }
    function createCmsCategory(Request $request){
        $result = DB::table('cmscategory')->insert(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/cmscategory'));
    }
    function updateCmsCategory(Request $request){
        $result = DB::table('cmscategory')->where('CategoryID', $request->CategoryID)->update(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/cmscategory'));
    }
    function deleteCmsCategory(Request $request){
        $result = DB::table('cmscategory')->where('CategoryID', $request->CategoryID)->delete();
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/cmscategory'));
    }
}
