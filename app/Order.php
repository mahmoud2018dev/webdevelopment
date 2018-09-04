<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';
    protected $fillable=[
        'name',
        'userid',
        'desc',
        'price',
        'photo'
    ];


    public  function user_id(){
        return $this->hasone('App\User','id','userid');

    }
}
