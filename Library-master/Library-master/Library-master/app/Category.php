<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = 'category';

    protected $fillable = [
        'name', 'active','photo' ];

    public function articles(){
        return $this->hasMany(Article::class);
        //return $this->belongsTo(Country::class,'country_id','id');
    }

    public function books(){
        return $this->hasMany(Book::class);
        //return $this->belongsTo(Country::class,'country_id','id');
    }


}
