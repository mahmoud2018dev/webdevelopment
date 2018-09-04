<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Catgory extends Model
{
    protected $table='catgories';
    protected $fillable =['name'];

    /*public  function productid()
    {
        return $this->hasmany('App\Product');
    }*/
}
