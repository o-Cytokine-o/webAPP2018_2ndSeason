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
        "cartItems" => $cartItems,
        
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
    /* $items = DB::where('id', $id)->get(); */
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    if(count($items) > 0){
        // セッションにデータを追加して格納
        $cartItems = session()->get("CART_ITEMS",[]);
        $cartItems[] = [
        'item'=>$items[0],
        'amount'=>1
        ];
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

Route::post("/cart/delete",function(){
    $delete_id = request()->get("delete_id");
    $cartItems = session()->get("CART_ITEMS",[]);
    $i=0;

    foreach($cartItems as $cartItem=>$key){
        if($key["item"]->id==$delete_id){
            array_splice($cartItems,$i,1);
        }
        $i++;
    }
    session()->put("CART_ITEMS",$cartItems);
    return redirect("/cart/list"); 
});

Route::post("/cart/add/all",function(){
    // フォームから IDを読み込みDBへ問い合わせる
    $id = request()->get("item_id");
    $qty = request()->get("qty");
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    $fg=false;
    $i=0;

    
    if(count($items) > 0){
        // セッションにデータを追加して格納
        $cartItems = session()->get("CART_ITEMS",[]);
        
        if($fg==false){
            foreach($cartItems as $cartItem=>$v){
                
                if($v["item"]->id==$items[0]->id){
                    $cartItems[$cartItem]["amount"]+=$qty;
                }
                else{
                    $cartItems[] = [
                        'item'=>$items[0],
                        'amount'=>$qty
                        ];
                }
            }
        }else{
            $cartItems[] = [
                'item'=>$items[0],
                'amount'=>$qty
                ];
        }
        
        session()->put("CART_ITEMS",$cartItems);
        return redirect("/cart/list");    
    }else{
        return abort(404);
    }        
});

Route::get("/order_page",function(){
    return view("order_page");
});

Route::post("/order",function(){

    // ここで カートの中身をDBに保存する    
    DB::insert("INSERT into orders (name,address,tel,email,orders) VALUES (?,?,?,?,?)",[
        request()->get("name"),
        request()->get("address"),
        request()->get("tel"),
        request()->get("email"),
        json_encode(session()->get("CART_ITEMS"))
    ]);
    
    session()->forget("CART_ITEMS"); // ここでカートを空に
   
    return redirect("/order/thanks");
});

Route::get("/order/thanks",function(){
    return view("order_thanks");
});