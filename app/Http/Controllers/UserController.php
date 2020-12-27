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
        session(['carts' => "Giỏ hàng"]);
        $categoryQuery = "";
        $rootCategories = DB::table('productcategory')->where('ParentID' , '=' , 0)->get();
        foreach ($rootCategories as $item){
            $categoryQuery .= $item->CategoryID . " OR ";
        }
        $categoryQuery = substr($categoryQuery, 0,-3);
        $categories = DB::select('select * from productcategory where ParentID = ' . $categoryQuery);
        View::share('categories', $categories);
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
                            <div class="puppy-center-section-title"><a href="san-pham/' .$item->Slug. '">'.$item->Name .'</a></div>
                            <ul class="rating">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <div class="puppy-center-section-price">
                                <div class="new-price">'. $item->Price . '</div>
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
        dd($request);
    }
    public function getIndex(){
        // dd(session()->get('carts'));

        $lastestProduct = DB::table('product')->latest("ProductID")->take(4)->get();
        $discountProduct = DB::table('product')->where('Status', '=', 1)->take(8)->get();
        return view('user.index',compact('discountProduct','lastestProduct'));
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
        $product = DB::table('product')->where('Slug', $tensanpham)->first();
        $brand = DB::table('brand')->where('BrandID', $product->BrandID)->first();

        $rateAvg = DB::table('Rate')->selectRaw('CAST(AVG(rate) AS DECIMAL(2,1)) AS avg')->first();
        
        
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
        return view('user.product')->with(array('product' => $product , 'brand' => $brand->Name , 'htmlRate' => $htmlRate , 'rateCount' => $rateCount[0]->rateCount));
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



        return view('user.collection')->with(array('categories'=> $categories , 'tendanhmuc' => $tendanhmuc , 'categoriesArr' => $categoriesArr , 'productList' => $productList , 'brandCount' => $brandCount , 'productBrand' => $productBrand , 'brandFilter' => 0));
        
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

        return view('user.collection')->with(array('categories'=> $categories , 'tendanhmuc' => $tendanhmuc , 'categoriesArr' => $categoriesArr , 'productList' => $productList , 'brandCount' => $brandCount , 'productBrand' => $productBrand , 'brandFilter' => 1));
    }

    public function profileDelivery(){
        return view('user.account.delivery');
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
