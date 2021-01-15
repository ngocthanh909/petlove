<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HelplerController as Helpler;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Helper methods
    function returnStatus($result){
        if ($result) {
            Helpler::message(1, 'Thao tác thành công!');
        } else {
            Helpler::message(0, 'Thao tác thất bại! Vui lòng kiểm tra lại!');
        }
    }

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
    // Admin Manager
    function adminManagerIndex(Request $request){
        $admins = DB::table('admin')->get();
        return view('admin.adminmanager')->with('admins', $admins);
    }
    function adminUpdateRole(Request $request){
        return  DB::table('admin')->where('AdminID', $request->AdminID)->update(['Role' => $request->Role]);
    }
    function adminUpdateActive(Request $request){
        return  DB::table('admin')->where('AdminID', $request->AdminID)->update(['Active' => $request->Active]);
    }
    function adminCreate(Request $request){
        $result =  DB::table('admin')->insert(['Username' => $request->Username, 'Password' => md5(1234, true), 'Name' => $request->Name, 'Role' => $request->Role, 'Active' => $request->Active]);
        $this->returnStatus($result);
        return redirect(url('admin/adminman'));
    }
    // User account managers
    function userManagerIndex(Request $request){
        $users = DB::table('user')->paginate(10);
        return view('admin.userman')->with('users', $users);
    }
    function userUpdateActive(Request $request){
        $result = DB::table('user')->where('UserID', $request->UserID)->update(['Active' => $request->Active]);
        $this->returnStatus($result);
        return redirect(route('admin.userman'));
    }
    function userDelete(Request $request){
        $result = DB::table('user')->where('UserID', $request->UserID)->delete();
        $this->returnStatus($result);
        return redirect(route('admin.userman'));
    }
    // Order
    function orderIndex(Request $request){
        $stmt = DB::table('order')->join('user', 'user.UserID', '=', 'order.UserID')->select('order.OrderID', 'user.UserID', 'user.Name', 'order.Price', 'order.PaymentMethod', 'order.Status', 'order.Status', 'order.PaymentStatus', 'order.Address', 'order.Phone');
        $approved = null;
        $sort = null;
        //Init fillter
        if (isset($request->approved)){
            $approved = $request->approved;
        }
        if (isset($request->sort)){
            $sort = $request->sort;
        }
        if($sort){
            switch($sort){
                case 'asc':
                    $stmt->orderBy('time', 'asc');
                    break;
                case 'desc':
                    $stmt->orderBy('time', 'desc');
                    break;
            }
        }
        if(isset($approved)){
            switch($approved){
                case 1:
                    $stmt->where('Status', '=', 1);
                    break;
                case 0:
                    $stmt->where('Status', '=', 0);
                    break;
            }
        }
        // dd($stmt->toSql());
       $result = $stmt->get();
        return view('admin.order')->with('orders', $result);
    }
    function orderDetailIndex(Request $request, $orderID) {
        $result = DB::table('orderdetail')->join('product',  'orderdetail.ProductID', '=', 'product.ProductID')->select('product.ProductID', 'product.Name', 'product.Price AS OriginalPrice', 'orderdetail.Quality', 'orderdetail.Price')->where('orderdetail.OrderID', '=',$orderID)->get();
        $detail = DB::table('order')->join('user', 'user.UserID', '=', 'order.UserID')->select('order.OrderID', 'user.UserID', 'user.Name', 'order.Price', 'order.PaymentMethod', 'order.Status', 'order.Status', 'order.PaymentStatus', 'order.Address', 'order.Phone', 'order.Time')->where('order.OrderID', '=', $orderID)->get();
        return view('admin.orderdetail')->with('orderds', $result)->with('detail', $detail);
    }
    function orderApprove(Request $request, $OrderID, $Status) {
        $result = DB::table('order')->where('OrderID', $OrderID)->update(['Status'=> $Status]);
        $this->returnStatus($result);
        return redirect(route('admin.order'));
    }
    function orderPaid(Request $request, $OrderID, $PaymentStatus) {
        $result = DB::table('order')->where('OrderID', $OrderID)->update(['PaymentStatus'=> $PaymentStatus]);
        $this->returnStatus($result);
        return redirect(route('admin.order'));
    }
    function invoiceIndex(Request $request, $orderID) {
        $result = DB::table('orderdetail')->join('product',  'orderdetail.ProductID', '=', 'product.ProductID')->select('product.ProductID', 'product.Name', 'product.Price AS OriginalPrice', 'orderdetail.Quality', 'orderdetail.Price')->where('orderdetail.OrderID', '=',$orderID)->get();
        $detail = DB::table('order')->join('user', 'user.UserID', '=', 'order.UserID')->select('order.OrderID', 'user.UserID', 'user.Name', 'order.Price', 'order.PaymentMethod', 'order.Status', 'order.Status', 'order.PaymentStatus', 'order.Address', 'order.Phone', 'order.Time')->where('order.OrderID', '=', $orderID)->get();
        return view('admin.invoice')->with('orderds', $result)->with('detail', $detail);
    }
    // Report
    function dashboardIndex(){
        $revenueMonth = DB::table('order')->where('PaymentStatus', '=', 1)->whereRaw('Month(Time) = ' . date('m'))->sum('Price');
        $revenueYear = DB::table('order')->where('PaymentStatus', '=', 1)->whereRaw('YEAR(Time) = ' . date('Y'))->sum('Price');
        $totalSoldYear = DB::table('order')->join('orderdetail', 'order.OrderID', '=', 'orderdetail.OrderID')->where('Order.PaymentStatus', '=', 1)->whereRaw('YEAR(Time) = ' . date('Y'))->sum('orderdetail.quality');
        $totalSoldMonth = DB::table('order')->join('orderdetail', 'order.OrderID', '=', 'orderdetail.OrderID')->where('Order.PaymentStatus', '=', 1)->whereRaw('Month(Time) = ' . date('m'))->sum('orderdetail.quality');
        return view('admin.dashboard')->with(['total' => ['revenueMonth'=> $revenueMonth,'revenueYear'=> $revenueYear, 'totalYear' => $totalSoldYear, 'totalMonth' => $totalSoldMonth]]);
    }

    public function ckEditorUpload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function getBlogPage(){
        $blogs = DB::table('blog')->get();
        return view('admin.blogmanager',compact('blogs'));
    }

    public function addBlogPage(Request $res){
        
        if ($res->Avatar != null){
            DB::table('blog')->insert(['name' => $res->PostTitle , 'slug' => $res->Slug , 'content' => $res->Content , 'viewCount' => 0 ,'Avatar' => $this->fileUpload($res, 'Avatar', "BlogImage", $res->Slug)]);
        }
        else {
            DB::table('blog')->insert(['name' => $res->PostTitle , 'slug' => $res->Slug , 'content' => $res->Content , 'viewCount' => 0 ,'Avatar' => 0]);
        }
        // dd($res->PostTitle);
        // DB::table('blog')->where('id',$res->BlogID)->delete();
        return redirect(url('admin/blogmanager'));
    }

    public function updateBlogPage(Request $res){
        if ($res->Avatar != null){
            DB::table('blog')->update(['name' => $res->PostTitle , 'slug' => $res->Slug , 'content' => $res->Content , 'viewCount' => 0 ,'Avatar' => $this->fileUpload($res, 'Avatar', "BlogImage", $res->Slug)]);
        }
        else {
            DB::table('blog')->update(['name' => $res->PostTitle , 'slug' => $res->Slug , 'content' => $res->Content , 'viewCount' => 0 ,'Avatar' => 0]);
        }
        return redirect(url('admin/blogmanager'));
    }

    public function removeBlogPage(Request $res){
        DB::table('blog')->where('id',$res->BlogID)->delete();
        return redirect(url('admin/blogmanager'));
    }
}
