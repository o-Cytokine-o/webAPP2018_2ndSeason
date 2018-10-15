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
        DB::insert("INSERT into items (name,img,description,price) VALUES (?,?,?,?)",[
            "M9",
            "https://hb-plaza.com/wp/wp-content/uploads/2015/05/ber_J92M9AOM.jpg",
            "スタンダードなM9です",
            "65000"
        ]);
        
        DB::insert("INSERT into items (name,img,description,price) VALUES (?,?,?,?)",[
            "グロック",
            "https://images-na.ssl-images-amazon.com/images/I/419%2BOKqfPRL.jpg",
            "連射ができるハンドガンです",
            "70000"
        ]);


    }
}
