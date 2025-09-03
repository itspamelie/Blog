<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cathegories_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('cathegories')->insert([
        "name"=>'Arboles','img'=>'default.jpg', 'created_at'=>date('y-m-d h:m:s')]);
         DB::table('cathegories')->insert([
        "name"=>'Arbustos','img'=>'default.jpg', 'created_at'=>date('y-m-d h:m:s')]);    }
}
