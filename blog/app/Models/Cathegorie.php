<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cathegorie extends Model
{
    protected $table="cathegories";
    protected $fillable=[
        'name',
        'img',
    ];
}
