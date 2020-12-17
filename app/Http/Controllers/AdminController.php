<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class AdminController extends Controller
{
    // Category Groups
    public $category;
    function index(){
        return view('admin.layouts.layout');
    }
    public function __construct()
    {
        $category = DB::table('danhmucsp')->get();
        $this->category = $category;
    }
    // Cây danh mục sản phẩm
    function createNested($categories, $parentId = 0)
    {
        $results = [];
        foreach ($categories as $category) {
            if ($parentId == $category->danhmuccha) {
                $nextParentId = $category->id;
                $category->children = $this->createNested($categories, $nextParentId);
                $results[] = $category;
            }
        }
        return $results;
    }
    public function category()
    {
        $categories = $this->createNested($this->category);
        return view('admin.category', compact('categories'));
    }
    static function showCategory($categories, $char = '')
    {
        foreach ($categories as $key => $category) {
            echo $char . $category->tendanhmuc;
            unset($categories[$key]);
            if (isset($category->children)) {
                echo '<ul>';
                AdminController::showCategory($category->children);
                echo '</ul>';
            }
        }
    }
    public function createCategory(Request $request)
    {
        $status = DB::table('danhmucsp')->insert(['tendanhmuc' => $request->tendanhmuc, 'slug' => $request->slug, 'danhmuccha' => $request->danhmuccha]);
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Thêm danh mục ' . $request->tendanhmuc . ' thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thêm danh mục thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/danhmuc'));
    }
    public function updateCategory(Request $request)
    {
        $status = DB::table('danhmucsp')->where('id', $request->id)->update(['tendanhmuc' => $request->tendanhmuc, 'slug' => $request->slug, 'danhmuccha' => $request->danhmuccha]);
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Sửa danh mục' . $request->tendanhmuc . ' thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Sửa danh mục thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/danhmuc'));
    }
    public function deleteCategory(Request $request)
    {
        $status = DB::table('danhmucsp')->where('id', $request->id)->delete();
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Xoá thành công danh mục ' . $request->tendanhmuc . ' thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Sửa danh mục thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/danhmuc'));
    }
    // Brand Groups
    public function brand(){
        $brands = DB::table('hang')->get();
        return view('admin.brand', compact('brands'));
    }
    public function createBrand(Request $request){
       $status = DB::table('hang')->insert(['tenhang' => $request->tenhang, 'mota' => $request->mota, 'slug' => $request->slug]);
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Thành công công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/nhanhang'));
    }
    public function readBrand(){
       return DB::table('hang')->get();
    }
    public function updateBrand(Request $request){
        $status = DB::table('hang')->where('id', $request->id)->update(['tenhang' => $request->tenhang, 'logo' => $request->logo, 'mota' => $request->mota, 'slug' => $request->slug]);
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Thành công công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/nhanhang'));
    }
    public function deleteBrand(Request $request){
        $status = DB::table('hang')->where('id', $request->id)->delete();
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Thành công công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/nhanhang'));
    }
    
    // Products Groups
    public function product(){
        return view('admin.product');
    }
    public function createProduct(Request $request){
        $status = DB::table('sanpham')->insert(['danhmuc' => $request->danhmuc, 'tensanpham' => $request->tensanpham, 'hang' => $request->hang, 'sku' => $request->sku, 'slug' => $request->slug, 'mota' => $request->mota, 'phanloai' => $request->phanloai, 'gia' => $request->gia, 'thoigianthem' => $request->thoigianthem]);
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Thêm sản phẩm' . $request->tensanpham . ' thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Thêm sản phẩm thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/danhmuc'));
    }
    public function readProduct(){
        $result = DB::table('product')->join('productcategory', 'productcategory.CategoryID', '=', 'product.CategoryID')->paginate(20);
        return $result;
    }
    public function updateProduct(Request $request){
        $status = DB::table('sanpham')->where('id', $request->id)->update(['danhmuc' => $request->danhmuc, 'tensanpham' => $request->tensanpham, 'hang' => $request->hang, 'sku' => $request->sku, 'slug' => $request->slug, 'mota' => $request->mota, 'phanloai' => $request->phanloai, 'gia' => $request->gia, 'thoigianthem' => $request->thoigianthem]);
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Sửa sản phẩm' . $request->tensanpham . ' thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Sửa sản phẩm thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/danhmuc'));
    }
    public function deleteProduct(Request $request){
        $status = DB::table('sanpham')->where('id', $request->id)->delete();
        if ($status) {
            session(['response' => ['status' => 1, 'msg' => 'Xoá thành công']]);
        } else {
            session(['response' => ['status' => 0, 'msg' => 'Xoá thất bại. Vui lòng kiểm tra lại']]);
        }
        return redirect(url('admin/danhmuc'));
    }
    // Upload function
    public function uploadProductDescription(Request $request){
        $request->upload->move(public_path('uploads'), $request->file('upload')->getClientOriginalName());
        echo json_encode(array('file_name' => $request->file('upload')->getClientOriginalName()));
    }
}
