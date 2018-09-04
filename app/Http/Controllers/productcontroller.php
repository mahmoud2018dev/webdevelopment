<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catgory;
use App\Order;
use App\Http\Controllers\paypalcontroller;
use Netshell\Paypal\Facades\Paypal;


class productcontroller extends Controller
{
    public function showallproduct()
    {
        $products=Product::all();
        $catgories=Catgory::all();

        //return response()->json($products); // for api
        return view('product.index',['products'=>$products,'catgories'=>$catgories]);

    }
   public function showacatgoriesproducts($id)
    {
        $products=Product::all()->where('catgoryid',$id);
        //return $products;
        //$catid=$products->catgoryid;
        $catgories1=Catgory::find($id);
        $catgories=Catgory::all();

        return view('product.cat_product',['products'=>$products,'catgories1'=>$catgories1,'catgories'=>$catgories]);

    }
    public  function  createproduct(){
        $catgories=Catgory::all();
       // return $catgories;
        /*foreach ($catgories as $c2)
        {
            print_r($c2->name);
        }*/

        return view('product.create',['catgories'=>$catgories]);
    }
    public function  storeproduct(Request $request){


        $data=$this->validate(request(),[
            //'catgoryid'=>'required',
            'name'=>'required',
            //'photo'=>'required|image|mimes:png,gif,jpeg,jpg',
            //'file'=>'required|array',
            'price'=>'required',
            'desc'=>'required'



        ],[],[
            //'catgoryid'=>'catgory of product',
            'name'=>'name  of product',
            'photo'=>'product photo',
            'price'=>'price product ',
            'desc'=>'product description'



        ]);
        $data['userid']=auth()->user()->id;
        $data['name']=request('name');
        $data['price']=request('price');
        $data['desc']=request('desc');
       // $data['catgoryid']=request('mycat');
        $data['catgoryid']=request('catgoryid');


        ///////////////////////////////////////// upload images and store in database



        $files=request()->file('file');
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            // return $name;
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            //$mim=$file->getMimeType();
            $realpath = $file->getRealPath();

            //return $realpath;
            $path = public_path('uploads');
            $file->move($path, $name);


            //$data['photo'] = $path . '/' . $name;
            $data['photo'] = $name;


        }
        ////////////////////////////////////////////
         //return request()->all();
        //return $data;

        Product::create($data);
        session()->flash('sucess','data added sucessfuly in products');
        return redirect('products');

    }
    public function search( ){

        $value=request('search');
        if($value)

        {
                          $products=Product::where('name','like','%'.$value.'%')
                          ->orwhere('desc','like','%'.$value.'%')
                          ->orwhere('price','like','%'.$value.'%')->get();
        //return request()->all();
        //return $products;


               if (count($products)>0)
                   //return response()->json($products);
                 return view('product.search', ['products' => $products]);
                 else return redirect('products')->with('status', 'no such products are  found! please refresh page and  search again');

          }
          else{
              //session()->flash('status', 'no such  products are found');
               return redirect('products')->with('status', 'no such products are  found! please refresh page and  search again');


          }



        //return request()->all();
        //return $products;



    }
    public function addtocart($id)
    {
        $products=Product::find($id);
        //return $products;
        $data=$this->validate(request(),[

            //'name'=>'required|uniquee',
            //'photo'=>'required|image|mimes:png,gif,jpeg,jpg',
            //'file'=>'required|array',


        ]);
        $order=  new Order();
        $order->name=$products->name;
        $order->price=$products->price;
        $order->desc=$products->desc;
        $order->photo=$products->photo;
        $order->userid=auth()->user()->id;

        $order->save();
        //return $order;
        return redirect('products');

        //return view('product.cart',['products'=>$products]);


    }
    public  function showcart(){
       $orders= Order::all()->where('userid',auth()->user()->id);
       //return $orders;
        $totalprice=Order::where('userid',auth()->user()->id)->sum('price');
        //return $totalprice;
        if($orders and $totalprice) //check if  arrays have values
        {
            return view('product.cart',['orders'=>$orders,'total'=>$totalprice]);
        }
         else
         {
             return redirect('products')->with('cartstatus', ' your shooping cart is empty add products to it and check agian ');
         }
    }
    public  function deleteproductfromcart($id)
    {
          $orders= Order::find($id);
          $orders->delete();
         return redirect('cart');

    }

    public  function paynow( Request $request ,$id)
    {
        $products=Order::find($id);
        //$total=Order::where('userid',auth()->user()->id)->sum('price');;
         //return $total;
        //return $products;
        if($products)
        {
            $paypal_class=new paypalcontroller();
            // return $products->name;
           return $paypal_class->getCheckout('USD',$products->name,$products->desc,$products->price);


        }else{

            return back();
        }

    }
    /*public  function paynowall(Request $request ,$id){
        $products=Order::all()->where('userid',auth()->user()->id);
        $total=Order::where('userid',auth()->user()->id)->sum('price');;
        //return $total;
        return $products;
        if($products)
        {
            $paypal_class=new paypalcontroller();

            return $paypal_class->getCheckout('USD',$products->name,$products->desc,$total);


        }else{

            return back();
        }


    }*/

    public  function  done( Request $request){

        $paypal_class=new paypalcontroller();
        $id = $request->get('paymentId');
        $token = $request->get('token');
        //return $id;
        $payer_id = $request->get('PayerID');

         $method=$paypal_class->check_payments($id,$token,$payer_id);
         //return dd($method);
         session()->put('finaelly',$method);
         return redirect('finaelly');

    }
    public  function  cansel(Request $request){



    }
    public  function  myfinaelly(){
        if(session()->has('finaelly'))
        {
            $method=session()->get('finaelly');
            session()->forget('finaelly');
            return view('paypal.show_paypal_state',['method'=>$method]) ;

        }else {
            return redirect('cart');
        }


    }

    public  function about(){

        return view('about');
    }
    public  function contact(){

        return view('contactus');
    }

}
