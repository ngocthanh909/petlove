<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;

class CartsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('user.layout.layout1', function ($view) {
            if(isset(session()->get('loginData')['logged'])){
                if (session()->get('loginData')['logged'] == 1){
                    session()->forget('cartsData');
                    $userID = session()->get('loginData')['data']['UserID'];
                    $cartDB = DB::table('cart')->where('UserID' , '=' , $userID)->get();
                    $cartsData[] = array ();
                    foreach ($cartDB as $cartItem){
                        $product = DB::table('product')->where('ProductID' , '=' , $cartItem->ProductID)->first();
                        $productPush = array (
                            'ProductID' => $cartItem->ProductID,
                            'Quantity' => $cartItem->Quality,
                            'ProductName' => $product->Name,
                            'ProductSKU' => $product->Sku,
                            'ProductPrice' => $product->Price,
                        );
                        session()->push('cartsData', $productPush);
                    }
                }
            }
        });
    }
}

