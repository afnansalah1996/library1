<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $table = 'comments';

  protected $fillable = [
      'users_id', 'books_id','comment' ];

  public function articles(){
      return $this->hasMany(Article::class);
      //return $this->belongsTo(Country::class,'country_id','id');
  }



    public function book(){
        return $this->belongsTo(Book::class,'books_id','id');

    }

    public function user(){
      return $this->belongsTo(User::class,'users_id','id');
    }
}
