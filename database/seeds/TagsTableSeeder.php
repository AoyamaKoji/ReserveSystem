<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param=[
        'name' => '居酒屋',
      ];
      DB::table('tags')->insert($param);

      $param=[
        'name' => '和食',
      ];
      DB::table('tags')->insert($param);

      $param=[
        'name' => '韓国料理',
      ];
      DB::table('tags')->insert($param);

      $param=[
        'name' => '安い',
      ];
      DB::table('tags')->insert($param);

      $param=[
        'name' => '駅チカ',
      ];
      DB::table('tags')->insert($param);

      $param=[
        'name' => '個室',
      ];
      DB::table('tags')->insert($param);

      $param=[
        'name' => '女子会',
      ];
      DB::table('tags')->insert($param);
    }
}
