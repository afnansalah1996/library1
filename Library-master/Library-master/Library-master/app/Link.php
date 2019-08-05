<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $table = 'link';

    protected $fillable = [
        'title', 'url', 'route', 'icon', 'parent_id', 'show_in_menu', 'order_id'
    ];
    public function users(){
        return $this->belongsToMany(User::class,'users_link', 'link_id', 'users_id');
    }
}
