<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stocks')->truncate();
       DB::table('stocks')->insert([
           'name' => '豚骨らーめん',
           'price' => 700,
           'imgpath' => '豚骨らーめん.JPG',
           'quantity'=>10,
       ]);
       
        DB::table('stocks')->insert([
           'name' => '醤油らーめん',
           'price' => 650,
           'imgpath' => '醤油らーめん.JPG',
            'quantity'=>10,
       ]);
       
       DB::table('stocks')->insert([
           'name' => "あっさり醤油らーめん",
           'price' => 700,
           'imgpath' => '和風あっさりしょうゆ.jpg',
            'quantity'=>10,
       ]);
       
        DB::table('stocks')->insert([
           'name' => 'ゆず塩らーめん',
           'price' => 700,
           'imgpath' => 'ゆず塩らーめん.jpg',
            'quantity'=>10,
       ]);
       
        DB::table('stocks')->insert([
           'name' => 'つけ麺らーめん',
           'price' => 750,
           'imgpath' => 'つけめん.jpg',
            'quantity'=>10,
       ]);
       
        
        DB::table('stocks')->insert([
           'name' => '餃子',
           'price' => 300,
           'imgpath' => 'ギョーザ.jpg',
            'quantity'=>10,
       ]);
       
       DB::table('stocks')->insert([
           'name' => '唐揚げ',
           'price' => 400,
           'imgpath' => 'からあげ.jpg',
            'quantity'=>10,
       ]);






    }
}
