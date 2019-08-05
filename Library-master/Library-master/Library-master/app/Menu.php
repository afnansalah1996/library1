<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'title', 'url', 'parent_id', 'active', 'order_id',
    ];

    public function topMenu(){
        return $this->belongsTo(Menu::class,'parent_id','id');
    }
}
