<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ecsite', function () {
    $items = DB::select("SELECT * FROM items");
    $cartItems = session()->get("CART_ITEMS",[]);
    return view('ECsite',[
        "items" => $items,
        "cartItems" => $cartItems
    ]);
});



Route::get("/item/{id}",function($id){
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    if(count($items) > 0){
        return view("item_details",[
          "item" => $items[0]
        ]);    
    }else{
        return abort(404);
    }    
});

Route::post("/cart/add",function(){
    // フォームから IDを読み込みDBへ問い合わせる
    $id = request()->get("item_id");
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    if(count($items) > 0){
        // セッションにデータを追加して格納
        $cartItems = session()->get("CART_ITEMS",[]);
        $cartItems[] =$items[0];
        session()->put("CART_ITEMS",$cartItems);
        return redirect("/cart/list");    
    }else{
        return abort(404);
    }        
});

Route::get("/cart/list",function(){
    // セッションからカートの情報を取り出す
    $cartItems = session()->get("CART_ITEMS",[]);
    
    return view("shoping-cart", [
        "cartItems" => $cartItems
    ]);
});

Route::post("/cart/clear",function(){
    session()->forget('CART_ITEMS');

    return redirect("/cart/list");
});

Route::post("/cart/add/all",function($qat){
    // フォームから IDを読み込みDBへ問い合わせる
    $id = request()->get("item_id");
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    $fg=false;
    $qty=request()->get("num-product1");

    
    if(count($items) > 0){
            // セッションにデータを追加して格納
            $cartItems = session()->get("CART_ITEMS",[]);
            foreach($cartItems as $cartItem){
                if(cartItem->id==$id){
                    $fg=true;
                }
            }
            $cartItems[] = [
                $items[0],
        ];
        session()->put("CART_ITEMS",$cartItems);
        return redirect("/cart/list");    
    }else{
        return abort(404);
    }        
});