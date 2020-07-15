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
         DB::table('stocks')->truncate(); //2回目実行の際にシーダー情報をクリア
       DB::table('stocks')->insert([
           'name' => '豚骨らーめん',
           'price' => 700,
           'imgpath' => '豚骨らーめん.JPG',
       ]);
       
        DB::table('stocks')->insert([
           'name' => '醤油らーめん',
           'price' => 650,
           'imgpath' => '醤油らーめん.JPG',
       ]);
       
       DB::table('stocks')->insert([
           'name' => "あっさり醤油らーめん",
           'price' => 700,
           'imgpath' => '',
       ]);
       
        DB::table('stocks')->insert([
           'name' => 'ゆず塩らーめん',
           'price' => 700,
           'imgpath' => '',
       ]);
       
        DB::table('stocks')->insert([
           'name' => 'つけ麺らーめん',
           'price' => 750,
           'imgpath' => '',
       ]);
       
        
        DB::table('stocks')->insert([
           'name' => '餃子',
           'price' => 300,
           'imgpath' => '',
       ]);
       
       DB::table('stocks')->insert([
           'name' => '唐揚げ',
           'price' => 400,
           'imgpath' => '',
       ]);






    }
}
