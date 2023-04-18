<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\User;
use Auth;
use Hash;

class DashboardController extends Controller
{
    public function index()
    {
        // $user=User::all();
        return view('backend.admin.dashboard');
    }
    public function form()
    {
        $user = Auth::User();
        // dd($user);
        return view('backend.admin.form', compact('user'));
    }
    public function form_update(Request $request, $id)
    {
        $this->validate($request, [

            'password' => 'required',

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $user->image = $filename;
        }
        $user->save();
    }
}
