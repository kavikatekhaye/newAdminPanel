<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function create(){
        $data=Category::all();
        return view('backend.blog.create',compact('data'));
    }

public function store(Request $request){
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required',

    ]);
    $data=new Blog();
    $data->title=$request->title;
    $data->description=$request->description;
    $data->category_id=$request->category_id;
    if($request->hasFile('image'))
    {
        $file=$request->image;
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads',$filename);
        $data->image=$filename;
    }
$data->save();
return redirect()->route('admin.blog.table')->with('msg','Data Inserted!Successfully');
}

public function table(){
    $data=Blog::paginate(10);
    return view('backend.blog.table',compact('data'));
}

public function edit($id){
    $data=Blog::with('category')->find($id);
    $categories=Category::all();
    return view('backend.blog.edit',compact('data','categories'));
}

public function update(Request $request,$id){$validated = $request->validate([
    'title' => 'required',
    'description' => 'required',
    // 'image' => 'required',

]);
    $data=Blog::find($id);
    $data->title=$request->title;
    $data->description=$request->description;
    if($request->hasFile('image'))
    {
        $file=$request->image;
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads',$filename);
        $data->image=$filename;
    }
$data->save();
return redirect()->route('admin.blog.table')->with('msg','Data Updated!Successfully');
}

public function delete($id){
    $data=Blog::find($id);
    $data->delete();
    return redirect()->route('admin.blog.table')->with('msg','Data Deleted!Successfully');
}




}
