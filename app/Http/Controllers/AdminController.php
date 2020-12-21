<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Helper methods
    function returnStatus($result){
        if ($result) {
            session(['response' => ['status' => 1, 'msg' => 'Thao tác thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thao tác thất bại. Vui lòng kiểm tra lại']]);
        }
    }
    // Master
    // function login(){
    //     return "<a href='/auth/redirect'>Login facebook</a>";
    // }
    function dashboard(){
        return view('admin.dashboard');
    }
    
    //Login
    function loginIndex(){
        return view('admin.login');
    }
    // Category
    function categoryIndex(Request $request){
        $categories = DB::table('productcategory')->paginate(20);
        return view('admin.category', compact('categories'));
    }
    function createCategory(Request $request){
        $result = DB::table('productcategory')->insert(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        $this->returnStatus($result);
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
        $this->returnStatus($result);
        return redirect(url('admin/category'));
    }
    function deleteCategory(Request $request){
        $result = DB::table('productcategory')->where('CategoryID', $request->CategoryID)->delete();
        $this->returnStatus($result);
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
        $result = DB::table('brand')->insert(['Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "BrandAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        $this->returnStatus($result);
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
            $result = DB::table('brand')->where('BrandID',$request->BrandID)->update(['Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "BrandAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        } else {
            $result = DB::table('brand')->where('BrandID',$request->BrandID)->update(['Name' => $request->Name, 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        }
        $this->returnStatus($result);
        return redirect(url('admin/brand'));
    }
    function deleteBrand(Request $request){
        $result = DB::table('brand')->where('BrandID', $request->BrandID)->delete();
        $this->returnStatus($result);
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
        $Price = null;
        if ($request->Status == 1){
            $Price = $request->OriginalPrice - ($request->OriginalPrice * ($request->Rate / 100));
        } else {
            $Price = $request->OriginalPrice;
        }
        $result = DB::table('product')->insert(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku, 'Price' => $Price, 'OriginalPrice' => $request->OriginalPrice, 'Status' => $request->Status, 'Rate' => $request->Rate, 'Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "ProductAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        $this->returnStatus($result);
        return redirect(url('admin/product'));
    }
    function updateProduct(Request $request){
        $Price = null;
        if ($request->Status == 1){
            $Price = $request->OriginalPrice - ($request->OriginalPrice * ($request->Rate / 100));
        } else {
            $Price = $request->OriginalPrice;
        }
       if(isset($request->Avatar)){
        $result = DB::table('product')->where('ProductID', '=', $request->ProductID)->update(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku, 'Price' => $Price, 'OriginalPrice' => $request->OriginalPrice, 'Status' => $request->Status, 'Rate' => $request->Rate, 'Name' => $request->Name, 'Avatar' => $this->fileUpload($request, 'Avatar', "ProductAvatar", $request->Slug), 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
       } else {
        $result = DB::table('product')->where('ProductID', $request->ProductID)->update(['BrandID' => $request->BrandID, 'CategoryID' => $request->CategoryID, 'Sku' => $request->Sku,  'Price' => $Price, 'OriginalPrice' => $request->OriginalPrice, 'Status' => $request->Status, 'Rate' => $request->Rate, 'Name' => $request->Name, 'Description' => $request->Description, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        }
        $this->returnStatus($result);
        return redirect(url('admin/product'));
    }
    function deleteProduct(Request $request){
        $result = DB::table('product')->where('ProductID', $request->ProductID)->delete();
        $this->returnStatus($result);
        return redirect(url('admin/product'));
    }

    // CMS Category
    function cmscategoryIndex(Request $request){
        $categories = DB::table('cmscategory')->paginate(10);
        return view('admin.cmscategory', compact('categories'));
    }
    function createCmsCategory(Request $request){
        $result = DB::table('cmscategory')->insert(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        $this->returnStatus($result);
        return redirect(url('admin/cmscategory'));
    }
    function updateCmsCategory(Request $request){
        $result = DB::table('cmscategory')->where('CategoryID', $request->CategoryID)->update(['ParentID' => $request->ParentID, 'Name' => $request->Name, 'Slug' => $request->Slug,  'Time' => date('Y-m-d H:i:s')]);
        $this->returnStatus($result);
        return redirect(url('admin/cmscategory'));
    }
    function deleteCmsCategory(Request $request){
        $result = DB::table('cmscategory')->where('CategoryID', $request->CategoryID)->delete();
        $this->returnStatus($result);
        return redirect(url('admin/cmscategory'));
    }
    // CMS
    function cmsIndex(){
        $cmss = DB::table('cms')->paginate(20);
        $categories = DB::table('cmscategory')->paginate(10);
        return view('admin.cms')->with('cmss', $cmss)->with('categories', $categories);
    }
    function createCms(Request $request){
        $result = DB::table('cms')->insert(['CategoryID' => $request->CategoryID, 'Title' => $request->Title, 'Description' => $request->Description, 'Content' => $request->Content, 'Avatar' => $this->fileUpload($request, 'Avatar', "CmsImage", $request->Slug), 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        $this->returnStatus($result);
        return redirect(url('admin/cms'));
    }
    function updateCms(Request $request){
        if(isset($request->Avatar)){
            $result = DB::table('cms')->where('CmsID', $request->CmsID)->update(['CategoryID' => $request->CategoryID, 'Title' => $request->Title, 'Description' => $request->Description, 'Content' => $request->Content, 'Avatar' => $this->fileUpload($request, 'Avatar', "CmsImage", $request->Slug), 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        } else {
            $result = DB::table('cms')->where('CmsID', $request->CmsID)->update(['CategoryID' => $request->CategoryID, 'Title' => $request->Title, 'Description' => $request->Description, 'Content' => $request->Content, 'Slug' => $request->Slug, 'Time' => date('Y-m-d H:i:s')]);
        }
        $this->returnStatus($result);
        return redirect(url('admin/cms'));
    }
    function deleteCms(Request $request){
        $result = DB::table('cms')->where('CmsID', $request->CmsID)->delete();
        $this->returnStatus($result);
        return redirect(url('admin/cms'));
    }
}
