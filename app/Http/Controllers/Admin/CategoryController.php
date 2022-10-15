<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){

        return view('backend.category.create');

       }
       public function store(Request $request){
        // dd($request);
        $validated = $request->validate([
            'title' => 'required',

        ]);
        $data=new Category();
        $data->title=$request->title;
        $data->save();
        return redirect()->route('admin.category.table');
       }

public function table(){
    $data=Category::paginate(5);
    return view('backend.category.table',compact('data'));

}

public function edit($id){
    $data=Category::find($id);
    return view('backend.category.edit',compact('data'));
}
public function update(Request $request,$id)
{
    $validated = $request->validate([
        'title' => 'required',
    ]);
    $data=Category::find($id);
    $data->title=$request->title;
    $data->save();
    return redirect()->route('admin.category.table');
}

public function delete($id){
    $data=Category::find($id);
$data->delete();
return redirect()->route('admin.category.table');
}


}
