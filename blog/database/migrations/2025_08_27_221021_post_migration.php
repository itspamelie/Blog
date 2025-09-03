<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*Dar de alta los campos de la tabla*/
        Schema::create('posts', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('img',100);
            $table->string('content',100);
            $table->string('likes',100);
            $table->ForeignId('user_id')->constrained('users');
            $table->ForeignId('cathegory_id')->constrained('cathegories');
            $table->integer('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
