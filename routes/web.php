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
    return view('ECsite',[
        "items" => $items
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
