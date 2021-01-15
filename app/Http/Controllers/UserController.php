<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Goutte\Client;
use View;
class UserController extends Controller
{
    public function __construct()
    {
        // $this->getCartsFromDB();
        $categoryQuery = "";
        $rootCategories = DB::table('productcategory')->where('ParentID' , '=' , 0)->get();
        foreach ($rootCategories as $item){
            $categoryQuery .= $item->CategoryID . " OR ";
        }
        $categoryQuery = substr($categoryQuery, 0,-3);
        $categories = DB::select('select * from productcategory where ParentID = ' . $categoryQuery);
        View::share('categories', $categories);
    }


    // function getCartsFromDB(){
        
    //     if (session()->get('loginData')['logged'] == 1){
    //         session()->forget('cartsData');
    //         $userID = session()->get('loginData')['data']['UserID'];
    //         $cartDB = DB::table('cart')->where('UserID' , '=' , $userID)->get();
    //         $cartsData[] = array ();
    //         foreach ($cartDB as $cartItem){
    //             $product = DB::table('product')->where('ProductID' , '=' , $cartItem->ProductID)->first();
    //             $productPush = array (
    //                 'ProductID' => $cartItem->ProductID,
    //                 'Quantity' => $cartItem->Quality,
    //                 'ProductName' => $product->Name,
    //                 'ProductSKU' => $product->Sku,
    //                 'ProductPrice' => $product->Price,
    //             );
    //             session()->push('cartsData', $productPush);
    //         }
    //     }
    // }


    public function getOrder(){
        if(session()->get('cartsData') == null){
            return redirect()->route('user.carts');
        };
        $getAccount = DB::table('user')->where('UserID' , '=' , session()->get('loginData')['data']['UserID'])->first();
        return view('user.order',compact('getAccount'));
    }
    public function getProductAjax (Request $request) {
 


        $productHTML = '';
        if($request->get('query')){
            $this->getCategoriesRecursive($request->get('query'));
        }   

        $product = DB::select('select * from product where Price != 0 AND (CategoryID = ' . substr($this->recursiveCategories,0,-3) . ')ORDER BY ProductID DESC LIMIT 4;');
        foreach ($product as $item){
            $productHTML .= '
            <div class="col-md-3 col-12 col-sm-6">
                <div class="puppy-center-body">
                    <div class="puppy-center-body-picture"><img style="height:173px; width:173px ; background-color: rgb(300, 300, 300);" src="'. $item->Avatar . '"></div>
                        <div class="puppy-center-body-section">
                            <div style = "white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="puppy-center-section-title"><a href="san-pham/' .$item->Slug. '">'.$item->Name .'</a></div>
                            <ul class="rating">';
                            $productAjaxRated = DB::table('rate')->selectRaw('CAST(AVG(rate) AS DECIMAL(2,1)) AS avg')->where('ProductID' , $item->ProductID)->first();
                            $productAjaxRatedRounded = round($productAjaxRated->avg);
                            for ($i = 0 ; $i < $productAjaxRatedRounded ; $i++){
                                $productHTML .= '<li><i class="fa fa-star"></i></li>';
                            }
                            for ($i = 0 ; $i < 5 - $productAjaxRatedRounded ; $i++){
                                $productHTML .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                        
                            }

         
                       
                            $productHTML .= '</ul>
                            <div class="puppy-center-section-price">
                                <div class="new-price">'. number_format($item->Price, 0, '', ',') . 'đ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        $productHTML .= '</div>';
        echo $productHTML;
    }

    private $recursiveCategories = "";
    function getCategoriesRecursive($id){
        $indexPoint = DB::table('productcategory')->where('ParentID' , '=' , $id)->get();
        if (!$indexPoint->isEmpty()){
            foreach ($indexPoint as $item){
                $this->recursiveCategories .= "CategoryID = " . $item->CategoryID . " OR ";
                $this->getCategoriesRecursive($item->CategoryID);
            }
        }

    }


    public function addCarts(Request $request){
        $product = DB::table('product')->where('ProductID' , '=' , $request->ProductID)->first();
        if ($product != null){
            $exist = 0;
            $getCartsData = session()->get('cartsData');
            if ($getCartsData != null){
                foreach ($getCartsData as $index => $cartProduct){
                    if ($cartProduct['ProductID'] == $product->ProductID){

                        $exist = 1;
                        $productPush = array (
                            'ProductID' => $cartProduct['ProductID'],
                            'Quantity' => $cartProduct['Quantity'] + $request->Quantity,
                            'ProductName' => $cartProduct['ProductName'],
                            'ProductSKU' => $cartProduct['ProductSKU'],
                            'ProductPrice' => $cartProduct['ProductPrice'],
                        );
                   
                        unset($getCartsData[$index]);
                        session(['cartsData' => $getCartsData]);
                        session()->push('cartsData', $productPush);
                        break;
                    }
                }
            }

           

            if ($exist == 0){
                $productPush = array (
                    'ProductID' => $product->ProductID,
                    'Quantity' => $request->Quantity,
                    'ProductName' => $product->Name,
                    'ProductSKU' => $product->Sku,
                    'ProductPrice' => $product->Price,
                );
                $cartsData[] = array ();
                
                session()->push('cartsData', $productPush);
                
            }

            $this->updateCartsInDB();

            return redirect()->back();
      
        }
    }

 



    public function submitOrder(){
        $price = 0;
        if (session()->get('cartsData') != null){
            foreach (session()->get('cartsData') as $item){
                $price += $item['ProductPrice'] * $item['Quantity'];
            }
      
            if ($price != 0){
    
                DB::table('order')->insert([
                    'UserID'   =>  session()->get('loginData')['data']['UserID'],
                    'Price'   =>   $price,
                    'Status'   =>   0,
                    'Time'      => date('Y-m-d H:i:s'),
                ]);
                $orderID = DB::getPdo()->lastInsertId();
                foreach (session()->get('cartsData') as $item){
                    DB::table('orderdetail')->insert([
                        'OrderID'   =>  $orderID,
                        'ProductID'   =>   $item['ProductID'],
                        'Quality'   =>   $item['Quantity'],
                        'Price'   =>   $item['ProductPrice'],
                    ]);
                }
                $this->clearCartInDB();
            }
        }

        

    

        return view('user.ordered');
    }
    public function changeCartsAjax(Request $request){
        // if($request->get('ammout')){
        //     echo 
        //     echo $request->get('ProductID');
        // }  
        
        $finalResult = "";
        $getCartsData = session()->get('cartsData');
        if ($getCartsData != null){
            foreach ($getCartsData as $index => $cartProduct){
                if ($cartProduct['ProductID'] == $request->get('ProductID')){
                    if ($request->get('action') == "+"){
                        $finalResult = $cartProduct['Quantity'] + 1;
                        $productPush = array (
                            'ProductID' => $cartProduct['ProductID'],
                            'Quantity' => $cartProduct['Quantity'] + 1,
                            'ProductName' => $cartProduct['ProductName'],
                            'ProductSKU' => $cartProduct['ProductSKU'],
                            'ProductPrice' => $cartProduct['ProductPrice'],
                        );
                    }
                    else {
                        $finalResult = $cartProduct['Quantity'] - 1;
                        $productPush = array (
                            'ProductID' => $cartProduct['ProductID'],
                            'Quantity' => $cartProduct['Quantity'] - 1,
                            'ProductName' => $cartProduct['ProductName'],
                            'ProductSKU' => $cartProduct['ProductSKU'],
                            'ProductPrice' => $cartProduct['ProductPrice'],
                        );
                    }
                    unset($getCartsData[$index]);
                    session(['cartsData' => $getCartsData]);
                    session()->push('cartsData', $productPush);
                    break;
                }
            }
        }
        $this->updateCartsInDB();
        echo $finalResult;


    }

    function updateCartsInDB(){
        if (session()->get('loginData')['logged'] == 1){
            $sessionCart = session()->get('cartsData');
            $userID = session()->get('loginData')['data']['UserID'];
            $user = DB::table('user')->where("UserID" , $userID)->first();
            DB::table('cart')->where('UserID', $userID)->delete();
            foreach (  $sessionCart as $item){
                DB::table('cart')->insert([
                    'UserID'   =>  $user->UserID,
                    'ProductID'   =>   $item['ProductID'],
                    'Quality' => $item['Quantity'],
                ]);
            }
        }
    }

    function clearCartInDB(){
        if (session()->get('loginData')['logged'] == 1){
            DB::table('cart')->where('UserID', session()->get('loginData')['data']['UserID'])->delete();
            session()->forget('cartsData');
        }
    }

    public function rateProduct(Request $request){
        if (session()->get('loginData')['logged'] == 1){

            $userID = session()->get('loginData')['data']['UserID'];
            DB::table('rate')->insert([
                'UserID'   =>  $userID,
                'ProductID'   =>   $request->ProductID,
                'Rate' => $request->rating,
                'Content' =>$request->comment,
            ]);
     
        }

        return redirect()->back();

    }


    public function removeProductCarts($id){
    
        $productPush = session()->get('cartsData');
        foreach ($productPush as $index => $product){
            if ($product['ProductID'] == $id){
                unset($productPush[$index]);
                break;
            }
        }
        session(['cartsData' => $productPush]);

        $this->updateCartsInDB();

        return redirect()->back();
        
    }
    public function getIndex(Request $request){
   
        // $this->getCartsFromDB();
        // session()->forget('cartsData');
        // dd(session()->get('cartsData'));
        // session()->flush();
        // dd(session()->get('loginData'));
        $highestRatedQuery = "";
        $highestRatedProduct = DB::table('rate')->orderBy('rate','desc')->latest("RateID")->take(3)->get();
        foreach ($highestRatedProduct as $product){
            $highestRatedQuery .= "ProductID = " . $product->ProductID . " OR ";
        }

        if (strlen(substr($highestRatedQuery, 0 ,- 4)) < 10){
            $highestRatedProduct = DB::table('product')->limit(3)->get();
        }
        else {
            $highestRatedProduct = DB::table('product')->whereRaw(substr($highestRatedQuery, 0 ,- 4))->get();
        }
        

        $highestRatedProductHTML = "";
        foreach ($highestRatedProduct as $index => $item){
            $highestRatedProductHTML .= '
            <div class="topproduct-body">
                <div class="topproduct-body-picture"><img src="'. $item->Avatar .'"><span class="badge-top">#' . ( $index + 1 ). '</span>
                </div>
                <div class="topproduct-body-section">
                <div style = "white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="topproduct-section-title"><a href="/san-pham/' . $item->Slug  . '">'. $item->Name .'</a>
                </div>
                <div class="topproduct-section-price">' .  number_format($item->Price, 0, '', ',') . ' VNĐ</div>
                <div class="topproduct-rate">
                    <ul class="rating" style="text-align: left">';

                    $highestRatedProductAvg = DB::table('rate')->selectRaw('CAST(AVG(rate) AS DECIMAL(2,1)) AS avg')->where('ProductID' , $item->ProductID)->first();
                    $hrpRounedAvg = round($highestRatedProductAvg->avg);
                    for ($i = 0 ; $i < $hrpRounedAvg ; $i++){
                        $highestRatedProductHTML .= '<li><i class="fa fa-star"></i></li>';
                    }
                    for ($i = 0 ; $i < 5 - $hrpRounedAvg ; $i++){
                        $highestRatedProductHTML .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                
                    }
 
                    $highestRatedProductHTML .= '</ul>
                </div>
                </div>
            </div>
            ';
        }
      

        $lastestProduct = DB::table('product')->latest("ProductID")->take(4)->get();
        $discountProduct = DB::table('product')->where('Status', '=', 1)->take(8)->get();
        return view('user.index',compact('discountProduct','lastestProduct' , 'highestRatedProductHTML'));
    }

    function Merged($id){
        return DB::table('product')->where('CategoryID', '=' , $id)->get();
    }

    private $resultID = [1];
    function recursiveProduct($id){
        $categories = DB::table('productcategory')->get();

        foreach($categories as $category){

            if ($category->ParentID == $id){
                array_push($this->resultID,$category->CategoryID);
                $this->recursiveProduct($category->CategoryID ); 
            }
        }
       
    }

    public function getProduct($tensanpham){
 


        $product = DB::table('product')->where('Slug' , '=' , $tensanpham)->first();
               
        $this->findParentCategories( $product->CategoryID);
        $categoriesArr = explode("/",$this->parentCategories);

        // $this->getCategoriesRecursive($product->CategoryID);
        // if ($this->recursiveCategories == null){
        //     $this->recursiveCategories = $product->CategoryID;
        // }
        // else {
        //     $this->recursiveCategories = substr($this->recursiveCategories,0,-3);
        // }

        // dd($this->recursiveCategories);

        $brand = DB::table('brand')->where('BrandID', $product->BrandID)->first();

        $rateAvg = DB::table('rate')->selectRaw('CAST(AVG(rate) AS DECIMAL(2,1)) AS avg')->where('ProductID' , $product->ProductID)->first();
        

        $rateCount = DB::select('SELECT COUNT(Rate) as rateCount FROM rate WHERE ProductID = ' . $product->ProductID);
        

        
        $htmlRate = "";

        $htmlRate .= '
        <ul class="rating" style="text-align: left">
        ';

        if ($rateAvg != null){
            $roundedRateAvg = round($rateAvg->avg);
            for ($i = 0 ; $i < $roundedRateAvg ; $i++){
                $htmlRate .= '<li><i class="fa fa-star"></i></li>';
            } 
            if ($roundedRateAvg != 5){
                for ($i = 0 ; $i < 5 - $roundedRateAvg ; $i++){
                    $htmlRate .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                }
            }
        }
        else {
            for ($i = 0 ; $i < $roundedRateAvg ; $i++){
                $htmlRate .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
            } 
        }

        $htmlRate .= '</ul>';


        $htmlSuggestedRate = "";
        $suggestProduct = DB::table('product')->where('CategoryID', $product->CategoryID)->inRandomOrder()->limit(6)->get();
        foreach ($suggestProduct as $item){
            $suggestProductRate = DB::table('rate')->selectRaw('CAST(AVG(rate) AS DECIMAL(2,1)) AS avg')->where('ProductID' , $item->ProductID)->first();
            
           
            $htmlSuggestedRate .= '
            <div class="topproduct-body">
                <div class="topproduct-body-picture"><img style="background: white ; height: 105px ; width: 105px" src="/'. $item->Avatar .'"></div>
                <div class="topproduct-body-section">
                <div class="topproduct-section-title"><a href= "/san-pham/'.  $item->Slug . '">'.$item->Name.'</a></div>
                <div class="topproduct-section-price">'. number_format($item->Price, 0, '', ',') .'VNĐ</div>
                <div class="topproduct-rate">
                    <ul class="rating" style="text-align: left">';
                    if ($suggestProductRate != null){
                        $suggestProductRate = round($suggestProductRate->avg);
                        for ($i = 0 ; $i < $suggestProductRate ; $i++){
                            $htmlSuggestedRate .= '<li><i class="fa fa-star"></i></li>';
                        } 
                        if ($suggestProductRate != 5){
                            for ($i = 0 ; $i < 5 - $suggestProductRate ; $i++){
                                $htmlSuggestedRate .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                            }
                        }
                    }
                    else {
                        for ($i = 0 ; $i < $suggestProductRate ; $i++){
                            $htmlSuggestedRate .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                        } 
                    }
                $htmlSuggestedRate .= '
                    </ul>
                </div>
                </div>
            </div> ';



        };

        $ratingComments = DB::table('rate')->where('ProductID', $product->ProductID)->get();
    
        
        $htmlRatingComments = '';
        foreach ($ratingComments as $comment){
            
            $ratingUser = DB::table('user')->where('UserID', $comment->UserID)->first();


            $htmlRatingComments .= '
            <div class="media">
                <div class="media-left"> <img src="'. $ratingUser->Avatar .'" class="media-object" style="width:60px"> </div>
                <div class="media-body">
                <h6 class="media-heading">'. $ratingUser->Name .'</h6>
                <p>
                <ul class="rating" style="text-align: left">';

            $ratingStarsCount = $comment->Rate;
            if ($ratingStarsCount != 0){
                for ($i = 0 ; $i < $ratingStarsCount ; $i++){
                    $htmlRatingComments .= '<li><i class="fa fa-star"></i></li>';
                } 
                if ($ratingStarsCount != 5){
                    for ($i = 0 ; $i < 5 - $ratingStarsCount ; $i++){
                        $htmlRatingComments .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                    }
                }
            }
            else {
                for ($i = 0 ; $i < $ratingStarsCount ; $i++){
                    $htmlRatingComments .= '<li><i class="fa fa-star" style = "color: grey"></i></li>';
                } 
            }
  
            $htmlRatingComments .= '
                </ul>
                </p>
                <p>'. $comment->Content .'</p>
                </div>
            </div>
            ';
        }
     

        return view('user.product')->with(array('product' => $product , 'brand' => $brand->Name , 'htmlRate' => $htmlRate , 'rateCount' => $rateCount[0]->rateCount , 'htmlSuggestedRate' => $htmlSuggestedRate , 'htmlRatingComments' => $htmlRatingComments ,'categoriesArr' => $categoriesArr));
    }
    public function getBlog(){
        return view('user.blog');
    }
    public function getAbout(){
        return view('user.about');
    }
    public function getCarts(){
        // dd(session()->get('cartsData'));
     
        return view('user.carts');
    }


    public function updateProfileSettings(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|numeric|min:11',
            'address' => 'required',
        ]);

        DB::table('user')->where('UserID', session()->get('loginData')['data']['UserID'])->update(['Address' => $request->address , 'Phone' => $request->phone]);
        return redirect()->route('user.settings');

    }
    public function profileSettings(){
        $getAccount = DB::table('user')->where('UserID' , '=' , session()->get('loginData')['data']['UserID'])->first();

        return view('user.account.profile',compact('getAccount'));
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


    public function searchWithFilter($name , $filter , Request $request){
        $sort = substr($request->input('sort'), 1);
        if (trim($sort) == "price-asc"){
            $queryRequest .= "ASC";
        }
        else if (trim($sort) == "price-desc"){
            $queryRequest .= "DESC";
        }

        

        $categories = DB::table('productcategory')->get();
        $productList = DB::table('product')->where('Name', 'LIKE', "%{$name}%")->orderBy('Price',$queryRequest)->paginate(8);
        $getRated = "";
        $productList2 = DB::table('product')->where('Name', 'LIKE', "%{$name}%")->get();
        foreach ($productList2 as $item){
            $getRated .= "ProductID = " . $item->ProductID . " OR ";
        }
        $ratedList = "";
        if (strlen(substr($getRated,0,-3)) > 10){
            $ratedList = DB::table('rate')->whereRaw(substr($getRated,0,-3))->get();
        }
        return view('user.search')->with(array('categories'=> $categories , 'productList' => $productList , 'ratedList' => $ratedList));
    }

    public function getCollectionWithFilter($tendanhmuc , $filter , Request $request){
        $query = "";
        $sort = substr($request->input('sort'), 1);
        $brand = "";
        if (strpos($filter, '=') !== false) {
            $brandID = explode( '=', $filter );
            if ($brandID[0] == "brand"){
                $brand = $brandID[1];
            }
        }

        $categories = DB::table('productcategory')->get();
        foreach($categories as $category){
            if ($category->Slug == $tendanhmuc){
                
                $this->findParentCategories( $category->CategoryID);
                $this->getCategoriesRecursive($category->CategoryID);
                if ($this->recursiveCategories == null){
                    $this->recursiveCategories = $category->CategoryID;
                }
                else {
                    $this->recursiveCategories = substr($this->recursiveCategories,0,-3);
                }

                break;
            }
        }

        $queryRequest = "";

        if (trim($brand) != ''){
            $query .= "BrandID = ".$brand;
        }
        
        if (trim($sort) == "price-asc"){
            $queryRequest .= "ASC";
        }
        else if (trim($sort) == "price-desc"){
            $queryRequest .= "DESC";
        }

        if ($queryRequest != ""){
            $productList = DB::table('product')->whereRaw('(CategoryID = ' . $this->recursiveCategories . ") AND " . $query)->orderBy('Price',$queryRequest)->paginate(8);
        }
        else {
            $productList = DB::table('product')->whereRaw('(CategoryID = ' . $this->recursiveCategories . ") AND " . $query)->paginate(8);
        }
    

        $brandCount = DB::select('SELECT BrandID, COUNT(BrandID) as DuplicateTimes FROM product WHERE CategoryID = ' . $this->recursiveCategories . ' GROUP BY BrandID HAVING COUNT(BrandID)>1');
        $productBrand = DB::table('brand')->where('BrandID' , '=' , $brand )->get();
        $categoriesArr = explode("/",$this->parentCategories);

        $getRated = "";
        $productList2 = DB::table('product')->whereRaw(' CategoryID = ' . $this->recursiveCategories)->get();
        foreach ($productList2 as $item){
            $getRated .= "ProductID = " . $item->ProductID . " OR ";
        }
        $ratedList = "";
        if (strlen(substr($getRated,0,-3)) > 10){
            $ratedList = DB::table('rate')->whereRaw(substr($getRated,0,-3))->get();
        }

        return view('user.collection')->with(array('categories'=> $categories , 'tendanhmuc' => $tendanhmuc , 'categoriesArr' => $categoriesArr , 'productList' => $productList , 'brandCount' => $brandCount , 'productBrand' => $productBrand , 'brandFilter' => 0 , 'ratedList' => $ratedList));
        
    }



    public function getCollection($tendanhmuc , Request $request){
        $sort = substr($request->input('sort'), 1);
        $categories = DB::table('productcategory')->get();
        foreach($categories as $category){
            if ($category->Slug == $tendanhmuc){
                
                $this->findParentCategories( $category->CategoryID);
                $this->getCategoriesRecursive($category->CategoryID);
                if ($this->recursiveCategories == null){
                    $this->recursiveCategories = $category->CategoryID;
                }
                else {
                    $this->recursiveCategories = substr($this->recursiveCategories,0,-3);
                }

                break;
            }
        }

        $queryRequest = "";
        
        if (trim($sort) == "price-asc"){
            $queryRequest .= "ASC";
        }
        else if (trim($sort) == "price-desc"){
            $queryRequest .= "DESC";
        }
  
        


        $productBrand = DB::table('brand')->get();
        $brandCount = DB::select('SELECT BrandID, COUNT(BrandID) as DuplicateTimes FROM product WHERE CategoryID = ' . $this->recursiveCategories . ' GROUP BY BrandID HAVING COUNT(BrandID)>1');
        if ($queryRequest != ""){
            $productList = DB::table('product')->whereRaw(' CategoryID = ' . $this->recursiveCategories)->orderBy('Price',$queryRequest)->paginate(8);
        }
        else {
            $productList = DB::table('product')->whereRaw(' CategoryID = ' . $this->recursiveCategories)->paginate(8);
        }
     
        $categoriesArr = explode("/",$this->parentCategories);

        $getRated = "";
        $productList2 = DB::table('product')->whereRaw(' CategoryID = ' . $this->recursiveCategories)->get();
        foreach ($productList2 as $item){
            $getRated .= "ProductID = " . $item->ProductID . " OR ";
        }
        $ratedList = "";
        if (strlen(substr($getRated,0,-3)) > 10){
            $ratedList = DB::table('rate')->whereRaw(substr($getRated,0,-3))->get();
        }
        
        return view('user.collection')->with(array('categories'=> $categories , 'tendanhmuc' => $tendanhmuc , 'categoriesArr' => $categoriesArr , 'productList' => $productList , 'brandCount' => $brandCount , 'productBrand' => $productBrand , 'brandFilter' => 1 , 'ratedList' => $ratedList));
    }


    public function search($name,Request $request){
        $queryRequest = "";
        $sort = substr($request->input('sort'), 1);
        if (trim($sort) == "price-asc"){
            $queryRequest .= "ASC";
        }
        else if (trim($sort) == "price-desc"){
            $queryRequest .= "DESC";
        }

        $categories = DB::table('productcategory')->get();

        if ($queryRequest != ""){
            $productList = DB::table('product')->where('Name', 'LIKE', "%{$name}%")->orderBy('Price',$queryRequest)->paginate(8);
        }
        else {
            $productList = DB::table('product')->where('Name', 'LIKE', "%{$name}%")->paginate(8);
        }

        
        $getRated = "";
        $productList2 = DB::table('product')->where('Name', 'LIKE', "%{$name}%")->get();
        foreach ($productList2 as $item){
            $getRated .= "ProductID = " . $item->ProductID . " OR ";
        }
        $ratedList = "";
        if (strlen(substr($getRated,0,-3)) > 10){
            $ratedList = DB::table('rate')->whereRaw(substr($getRated,0,-3))->get();
        }
        return view('user.search')->with(array('categories'=> $categories , 'productList' => $productList , 'ratedList' => $ratedList));
    }


    public function profileDelivery(){
        $orderList = DB::table('order')->where("UserID" ,session()->get('loginData')['data']['UserID'])->get();
        $orderQuery = "";
       
        foreach ($orderList as $order){
            $orderQuery .= "OrderID = " . $order->OrderID . " OR ";
        }
        
        $orderListDetail = DB::table('orderdetail')->whereRaw(substr($orderQuery,0,-4))->get();
       

        $productListQuery = "";
        foreach ($orderListDetail as $productDetail){
            $productListQuery .= "ProductID = " . $productDetail->ProductID . " OR ";
        }

        $productList = DB::table('product')->whereRaw(substr($productListQuery,0,-3))->get();
        
        return view('user.account.delivery',compact('orderList','orderListDetail','productList'));
    }

    public function petCityCrawler(){
        $this->categoryRecursive(0);
        return view('user.crawler')->with('htmlOption',$this->htmlOption);
    }

    private $htmlOption;
    
    function categoryRecursive($id , $text = '' ,$start = 0){
        $categories = DB::table('productcategory')->get();

        foreach($categories as $category){

            if ($category->ParentID == $id){
                if (strlen($text) == 0 || strlen($text) == 1){
                    $this->htmlOption .= '<optgroup label = "'. $category->Name .'">';
                 
                    if ($start == 1){
                        $this->htmlOption .= '</optgroup>';
                       

                    }
                    $start = 1;
                }
                else {
                    $this->htmlOption .= '<option value = '. $category->CategoryID .'>' . $category->Name . '</option>';
                  
                }
                
                $this->categoryRecursive($category->CategoryID , $text . '-' , $start);
           
                
            }
        }
    }



    function crawlFunc($url , $CategoryID , $Option) {
        set_time_limit(600);
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.petcity.vn/'.$url);
        $elements = $crawler->filter('.p_container')->each(function($node) use (&$CategoryID){
            $link = $node->filter('a')->first()->extract(array('href'));

            $client2 = new Client();
            $crawler2 = $client2->request('GET','https://www.petcity.vn/'. implode($link));
            $avatarImg = $crawler2->filter('#img-large')->filter('img')->first()->getNode(0)->getAttribute('src');
            $avatarImgName = explode("/",$avatarImg);
            
            echo "https://www.petcity.vn" . $avatarImg . '<br>';
            file_put_contents(storage_path('app/public/ProductAvatar/' . end($avatarImgName)), file_get_contents("https://www.petcity.vn" . $avatarImg));
            $productName = $crawler2->filter('#detail-name')->first()->html();
            $productBrand = $crawler2->filter('.pink')->eq(0)->html();
            $productSKU= $crawler2->filter('.pink')->eq(1)->html();
            // eq(3)->filter('p')->first()->html();
            $productFinalPrice = $crawler2->filter('#price_config')->first()->html();
          
            $productFinalPrice =  str_replace("đ","",str_replace(".","",$productFinalPrice));


            if ($crawler2->filter('.Dprice')->first()->filter('span')->count() > 1){
                $productOrginalPrice = $crawler2->filter('.Dprice')->first()->filter('span')->eq(1)->html();
            }
            else {
                $productOrginalPrice = $productFinalPrice;
            }

            $productOrginalPrice =  str_replace("đ","",str_replace(".","",$productOrginalPrice));

            $content = $crawler2->filter('#tab1')->html();
            $contentHandled = str_replace("http://www.petcity.vn","",str_replace("/media/lib/","/".'storage/ProductContent/',preg_replace('/<a href="(.+)">/', '', $content)));
            $crawler2->filter('#tab1')->filter('img')->each(function($image){
                $imageSrc = $image->getNode(0)->getAttribute('src');
                $imageSrc = str_replace("http://www.petcity.vn","",$imageSrc);
                $domain = "https://www.petcity.vn";
                echo "https://www.petcity.vn" . $imageSrc . '<br>';
           
                try {
                    $imageObj = file_get_contents($domain . $imageSrc);

                    $imgName = explode("/",$imageSrc);
                    file_put_contents(storage_path('app/public/ProductContent/' . end($imgName)), $imageObj);
                }
                catch (\Exception $e){

                }

            });
            

            
            $brandDB = DB::table('brand')->where('Name', '=', $productBrand )->first();
            if ($brandDB === null) {
                DB::table('brand')->insert(
                    array(
                        'Name'   =>   $productBrand,
                        'Slug'   =>   Str::slug($productBrand)
                    )
                );
            }

            $brandDB = DB::table('brand')->where('Name', '=', $productBrand )->first();



            $discount = 0;
            $rate = 0;
            if ((int)$productFinalPrice != (int)$productOrginalPrice){
                $discount = 1;
                $rate = ((int)$productOrginalPrice - (int)$productFinalPrice) /  (int)$productFinalPrice * 100;
               
            }


            DB::table('product')->insert([
       
                'CategoryID'   =>  $CategoryID,
                'BrandID'   =>   $brandDB->BrandID,
                'Name' => $productName,
                'SKU' => $productSKU,
                'Slug' =>  Str::slug($productName),
                'Avatar' => 'storage/ProductAvatar/' . end($avatarImgName) ,
                'Description' => $contentHandled,
                'Price' => (int)$productFinalPrice,
                'OriginalPrice' => (int)$productOrginalPrice,
                'Status' => $discount,
                'Rate' => (int)$rate
            
            ]);
            echo '<br>';
        });

        if ($Option == "yes"){
            if ($crawler->filter('.pagingIntact')->count()){
                $next = $crawler->filter('.pagingIntact')->last()->filter('a')->first();
                if ($next->html() == "Tiếp theo"){
                  $this->crawlFunc(implode($next->filter('a')->first()->extract(array('href'))),$CategoryID);
                }
            }
        }



    }

    public function petcityCrawlResult(){
        return view("user.crawlresult");
    }


    public function petCityCrawlerHandle(Request $request){

        $this->crawlFunc($request->url , $request->categoryid , $request->option);

    }

    public function testSaveImage(){

    }

}
