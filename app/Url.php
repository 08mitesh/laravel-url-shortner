<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    protected $fillable = ['original_url','shorten_url'];

    public static function  boot(){
        parent::boot();
        static::creating(function ($url){
            $url->shorten_url = Str::random();
        });
    }
}
