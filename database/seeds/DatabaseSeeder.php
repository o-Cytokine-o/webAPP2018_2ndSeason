<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "M9",
            "https://hb-plaza.com/wp/wp-content/uploads/2015/05/ber_J92M9AOM.jpg",
            "スタンダードなM9です",
            "65000",
            "ハンドガン"
        ]);
        
        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "グロック",
            "https://images-na.ssl-images-amazon.com/images/I/419%2BOKqfPRL.jpg",
            "連射ができるハンドガンです",
            "70000",
            "ハンドガン"
        ]);
        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "P90",
            "https://www.bigmagnum.jp/pic-labo/P90p.jpg",
            "レン仕様のP90です。",
            "140000",
            "サブマシンガン"
        ]);
        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "L96A1",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKTWyYdVTS4DlcIUthxzWfPcld1lan5G7ruocC-98lK9n5WCqJ",
            "メカニズムはボルトアクション式のライフルで、弾薬は脱着式のマガジンに最大で10発まで装填可能。",
            "250000",
            "スナイパーライフル"
        ]);
        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "クレイモア地雷",
            "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/US_M18a1_claymore_mine.jpg/300px-US_M18a1_claymore_mine.jpg",
            "重量は1.6キログラム。湾曲した箱状の外観に700個の鉄球とC-4を内包する。地上に敷設して起爆すると鉄球を扇状に発射し、設置位置の前面に鉄球を投射することにより、1基で広範囲に殺傷能力を発揮する。",
            "9000",
            "ガジェット"
        ]);
        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "グレネード",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5xNG1FPSmQOy0e466zRO7f9otL4t_xMjK3wxpDoPrjiyqg5Ie",
            "手榴弾",
            "4000",
            "ガジェット"
        ]);

        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "火炎放射器",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHiHhh399ckriPi_Cb8TNpNIVMVKYdxw3y-bk3xJ_LozhdBvyT",
            "炎によって、対象物を焼却する。",
            "190000",
            "ガジェット"
        ]);

        DB::insert("INSERT into items (name,img,description,price,category) VALUES (?,?,?,?,?)",[
            "SCAR",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_eyFcUxouWWK6Uxgte4KIWcPB-wK7RSnSvsNtPB6P86hWiGwp",
            "アサルトライフルである。",
            "250000",
            "アサルトライフル"
        ]);

        
    }
}
