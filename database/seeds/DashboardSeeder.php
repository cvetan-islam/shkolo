<?php

use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder {

  public function run()
  {
    DB::table('dashboard')->delete();

    for($i = 1; $i < 10; $i++) {
      DB::table('dashboard')->insert([
        'title' => $i,
        'link' => '',
        'color' => 0,
      ]);
    }


  }

}