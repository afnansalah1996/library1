<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';

    protected $fillable = [
        'title', 'summary', 'auther','users_id', 'active', 'published' , 'category_id' ,'photo' ,'bookfile'  ];

    public function Category(){
        return $this->belongsTo(Category::class ,'category_id','id');
        //return $this->belongsTo(Country::class,'country_id','id');
    }


     public function bookuser(){
     return $this->belongsTo(User::class ,'users_id','id');
     }

     public function comment(){
     return $this->hasMany(Comment::class,'books_id','id');
     }

}
