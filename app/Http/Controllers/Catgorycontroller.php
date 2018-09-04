<?php

namespace App\Http\Controllers;
use App\Catgory;

use Illuminate\Http\Request;

class Catgorycontroller extends Controller
{

    public  function createcatgories(){

        return view('catgory.create');

    }
    public function addcatgory(){

        $data=$this->validate(request(),[
            'name'=>'required'
        ]);



              $catname= new Catgory();
              $catname->name=request('name');
              //return $catname->name;
                $catname->save();


        return redirect('products');
    }

}
