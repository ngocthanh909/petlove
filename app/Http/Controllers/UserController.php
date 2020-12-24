<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Goutte\Client;
use View;
class UserController extends Controller
{
    public function __construct(){
        $categories = DB::table('productcategory')->get();
        View::share('categories', $categories);
    }
    public function getIndex(){
        $categories = DB::table('productcategory')->get();
        $products = DB::table('product')->where('Status', '=', 1)->take(8)->get();
        // $dogProduct = DB::table('product')->where('Status', '=', 1)->take(8)->get();

        // $catProduct = DB::table('product')->where('Status', '=', 1)->take(8)->get();

   
        // $startID = 1;
        // $unionVar = DB::table('product')->where("CategoryID" , '=' , $startID)->get();
        // $test = $this->recursiveGetProduct($startID , $unionVar);
        // dd($test);
 
        // foreach ($test as $item){
        //     echo $item->Name . '<br>';
        // }

  
        // $category = DB::table('productcategory')->get();
        // $list_cat = $this->data_tree($category, 0);
        

        $this->recursiveProduct(1);


        // $getLastestProduct = DB::table('product')->where('CategoryID', '=' , 1)->get();
        // foreach ($this->resultID as $item){
        //     $getLastestProduct = $getLastestProduct->merge($this->Merged($item));
        // }

        
        // $getLastestProduct = DB::select('SELECT * FROM product WHERE CategoryID=?', $this->resultID)->get();
          

        
        // $stringObj = "";
        // foreach ($this->resultID as $index => $item){
        //     if ($index == count($this->resultID) - 1){
        //         $stringObj .= 'CategoryID =' .$item;
        //     }
        //     else {
        //         $stringObj .= 'CategoryID =' . $item . " OR ";
                
        //     }
        // }


        // $getLastestProduct = DB::table('product')::whereRaw($stringObj)->get();

        // dd($getLastestProduct);

        return view('user.index',compact('categories','products','getLastestProduct'));
    }

    function Merged($id){
        return DB::table('product')->where('CategoryID', '=' , $id)->get()->last();
    }

    private $resultID = [1];
    function recursiveProduct($id){
        $categories = DB::table('productcategory')->get();

        foreach($categories as $category){

            if ($category->ParentID == $id){
                array_push($this->resultID,$category->CategoryID);
                // $query = DB::table('product')->where("CategoryID" , '=' , $category->CategoryID)->count();
                // if ($query != 0){
                    
                // }
                $this->recursiveProduct($category->CategoryID ); 
            }
        }
       
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


        // $elements = $crawler->filter('.p_container');
        // foreach ($elements as $node){
      
        //     $link = $node->filter('a')->first()->extract(array('href'));

        //     $client2 = new Client();
        //     $crawler2 = $client2->request('GET','https://www.petcity.vn/'. implode($link));
        //     $avatarImg = $crawler2->filter('#img-large')->filter('img')->first()->getNode(0)->getAttribute('src');
        //     $avatarImgName = explode("/",$avatarImg);
            
        //     echo "https://www.petcity.vn" . $avatarImg . '<br>';
        //     file_put_contents(storage_path('app/public/ProductAvatar/' . end($avatarImgName)), file_get_contents("https://www.petcity.vn" . $avatarImg));
        //     $productName = $crawler2->filter('#detail-name')->first()->html();
        //     $productBrand = $crawler2->filter('.pink')->eq(0)->html();
        //     $productSKU= $crawler2->filter('.pink')->eq(1)->html();
        //     // eq(3)->filter('p')->first()->html();
        //     $productFinalPrice = $crawler2->filter('#price_config')->first()->html();
        //     $productFinalPrice =  str_replace("đ","",$productFinalPrice);
        //     if ($crawler2->filter('.Dprice')->first()->filter('span')->count() > 1){
        //         $productOrginalPrice = $crawler2->filter('.Dprice')->first()->filter('span')->eq(1)->html();
        //     }
        //     else {
        //         $productOrginalPrice = "0";
        //     }

        //     $productOrginalPrice =  str_replace("đ","",$productOrginalPrice);

        //     $content = $crawler2->filter('#tab1')->html();
        //     $contentHandled = str_replace("http://www.petcity.vn","",str_replace("/media/lib/","/".'storage/ProductContent/',preg_replace('/<a href="(.+)">/', '', $content)));
        //     $crawler2->filter('#tab1')->filter('img')->each(function($image){
        //         $imageSrc = $image->getNode(0)->getAttribute('src');
        //         $imageSrc = str_replace("http://www.petcity.vn","",$imageSrc);
        //         $domain = "https://www.petcity.vn";
        //         echo "https://www.petcity.vn" . $imageSrc . '<br>';
           
        //         try {
        //             $imageObj = file_get_contents($domain . $imageSrc);

        //             $imgName = explode("/",$imageSrc);
        //             file_put_contents(storage_path('app/public/ProductContent/' . end($imgName)), $imageObj);
        //         }
        //         catch (\Exception $e){

        //         }

        //     });
            

            
        //     $brandDB = DB::table('brand')->where('Name', '=', $productBrand )->first();
        //     if ($brandDB === null) {
        //         DB::table('brand')->insert(
        //             array(
        //                 'Name'   =>   $productBrand,
        //                 'Slug'   =>   Str::slug($productBrand)
        //             )
        //         );
        //     }

        //     $brandDB = DB::table('brand')->where('Name', '=', $productBrand )->first();




        //     DB::table('product')->insert([
       
        //         'CategoryID'   =>  $CategoryID,
        //         'BrandID'   =>   $brandDB->BrandID,
        //         'Name' => $productName,
        //         'SKU' => $productSKU,
        //         'Slug' =>  Str::slug($productName),
        //         'Avatar' => 'storage/ProductAvatar/' . end($avatarImgName) ,
        //         'Description' => $contentHandled,
        //         'Price' => (float)$productFinalPrice,
        //         'OriginalPrice' => (float)$productOrginalPrice,
        //         'Status' => 1,
        //         'Rate' => 69
            
        //     ]);

  
            
        // }
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

  
            


            
            // echo $avatarImg . '<br>' .$productName . '<br>' . $productBrand . '<br>' .$productSKU . '<br>' .$productFinalPrice . '<br>' . $productOrginalPrice;
            // echo '<br>';

            
            // foreach ($contentRegrex[1] as $ht){
            //     echo $ht . '<br>';
            // }
            // echo substr(implode($contentRegrex), 5) . "<br>";

            // $imgSrc = explode("/",implode($contentRegrex), 5);

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
        // echo $request->categoryid;
        // echo $request->option;
    }

    public function testSaveImage(){
        // $image = file_get_contents("https://www.petcity.vn/media/product/4124_pate_cho_mat_truoc_408x600.jpg");
        // file_put_contents(storage_path('app/public/images/productimg/a.png'), $image);
        // echo "DOne";
        // $brandName = "nani2";

        // $user = DB::table('brand')->where('Name', '=', $brandName )->first();
        // if ($user === null) {
        //     DB::table('brand')->insert(
        //         array(
        //             'Name'   =>   $brandName,
        //             'Slug'   =>   Str::slug($brandName)
        //         )
        //     );
        // }

        // else {
        //     echo $user->BrandID;
        // }

        $product = DB::table('product')->get();
        return view('user.test',compact('product'));
    }

}
