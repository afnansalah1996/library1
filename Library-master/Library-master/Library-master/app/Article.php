<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';

    protected $fillable = [
        'title', 'summary', 'details', 'active', 'published' , 'category_id' ,'photo'  ];

    public function category(){
        return $this->belongsTo(Category::class ,'category_id','id');
        //return $this->belongsTo(Country::class,'country_id','id');
    }
}


    // public function user(){
    //     return $this->belongsTo(User::class ,'id','id');
    //     //return $this->belongsTo(Country::class,'country_id','id');
    // }
