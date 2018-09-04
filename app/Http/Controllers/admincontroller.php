<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catgory;


class admincontroller extends Controller
{

    public function adminpage()
    {

        return view('admin.index');
    }

    public function displayproduct()
    {
        $products = Product::all();
        return view('admin.allproduct', ['products' => $products]);


    }

    public function displaycatgory()
    {
        $catgories = Catgory::all();
        return view('admin.allcatgories', ['catgories' => $catgories]);
    }

    public function editproduct($id)
    {
        $products = Product::find($id);
        $catgories = Catgory::all();
        return view('admin.editproduct', ['products' => $products, 'catgories' => $catgories]);

    }

    public function upadteproduct($id)
    {
        $products = Product::find($id);

        //return $products;

        //$products->userid=auth()->user()->id;
        $products->name = request('name');
        $products->price = request('price');
        $products->desc = request('desc');

        ///////////////////////////////////////// upload images and store in database
        $files=request()->file('file');
        //return $files;
        foreach ($files as $file)
        {
            $name = $file->getClientOriginalName();
            // return $name;
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            //$mim=$file->getMimeType();
            $realpath = $file->getRealPath();

            //return $realpath;
            $path = public_path('uploads');
            $file->move($path, $name);
            $products->photo=$name;
        }

            //return $products;
            $products->save();
         return redirect('allproducts');

        }
        public  function deleteproduct($id){
            $products = Product::find($id);
            $products->delete();
            return redirect('allproducts');
            //return $products;

        }
        public  function  editcatgory($id)
        {
            $catgories = Catgory::find($id);
            return view('admin.editcatgory', ['catgories' => $catgories]);

        }
        public  function upadtecatgory($id){
            $catgories = Catgory::find($id);
            $catgories->name=request('name');
             //return $catgories->name;
            $catgories->save();
            //return $catgories;
             return redirect('allcatgories');

        }
        public function deletecatgory ($id){
            $catgories = Catgory::find($id);
            //return $catgories;
            $catgories->delete();
            return redirect('allcatgories');

        }


}