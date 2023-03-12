<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $data=Blog::paginate(4);
        $latest_blog=Blog::latest()->first();
        $categories = Category::all();
        return view('welcome',compact('data','latest_blog','categories'));
    }




    public function detail($id){
        //for view count
        Blog::find($id)->increment('views');
        $data=Blog::with('category')->find($id);
        $categories = Category::all();
        // dd($data);
        return view('frontend.detail',compact('data','categories'));
    }




    public function view($id){
        $categories = Category::all();
        $data=Blog::where('category_id',$id)->get();
        return view('frontend.dashboard',compact('data','categories'));



    }

    public function master(){
        return view('master');
    }
}
