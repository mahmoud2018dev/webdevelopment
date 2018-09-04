<?php

namespace App;
use App\Catgory;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable=[
        'name',
        'userid',
        'catgoryid',
        'desc',
        'price',
        'photo'
    ];
    /*public function catgoryid()
    {
        return $this->belongsTo('App\Catgory');
    }*/
    public  function cat_id(){
        return $this->hasone('App\Catgory','id','catgoryid');

    }
    public  function user_id(){
        return $this->hasone('App\User','id','userid');

    }
}
