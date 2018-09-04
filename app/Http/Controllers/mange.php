<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class mange extends Controller
{
    //
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  addarticle(Request $request){
        if($request->isMethod('post'))
        {
            $art= new Article();
            $art->title=$request->input('title');
            $art->body=$request->input('body');
            $art->userid=Auth::user()->id;
            return $art;
            $art->save();
            return redirect('show');
        }
        return view('mange.addarticle');
    }
    public  function show(){
        $articles=Article::all();
        $artarray=array('articles'=>$articles);
        return view('mange.show',$artarray);

    }
    public  function read(Request $request ,$id){
        if($request->isMethod('post'))
        {
            $com= new Comment();
            $com->comment=$request->input('comment');
            $com->articleid=$id;
            $com->save();

        }

        $article= DB::select('select * from articles where id = ?',[$id]);

     return view('mange.read',['article'=>$article]);
    }
}
