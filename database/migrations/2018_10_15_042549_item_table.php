<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //武器名
            $table->string('img'); // 武器画像
            $table->string('description')->nullable(true); // 武器の説明文
            $table->unsignedInteger('price'); //　武器の価格
            $table->unsignedInteger('weight')->nullable(true); //　武器の重量
            $table->string('category')->nullable(true); //武器のカテゴリー
            $table->string('ammoK')->nullable(true); //武器の弾の種類
            $table->unsignedInteger('amloaded')->nullable(true); //武器の装弾数
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
