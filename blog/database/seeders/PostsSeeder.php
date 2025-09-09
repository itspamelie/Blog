<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('posts')->insert([
        "title"=>'Como cuidar las suculentas','description'=>'Aprende como cuidar y como regarlas.',
        'img'=>'default.jpg','content'=>'Contenido del post','slug'=>'234455',
        'likes'=>0, 'user_id'=>1, 'cathegory_id'=>1, 'created_at'=>date('y-m-d h:m:s')]);

        DB::table('posts')->insert([
        "title"=>'Datos sobre las bugambilias','description'=>'Aprende curiosidades de esta planta.',
        'img'=>'default.jpg','content'=>'Contenido del post','slug'=>'234234',
        'likes'=>0, 'user_id'=>1, 'cathegory_id'=>1, 'created_at'=>date('y-m-d h:m:s')]);
    }
}
