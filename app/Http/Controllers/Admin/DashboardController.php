<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\User;
use Auth;
class DashboardController extends Controller
{
    public function index(){
        // $user=User::all();
        return view('backend.admin.dashboard');
    }
    public function form(){
        $user=Auth::User();
        // dd($user);
        return view('backend.admin.form',compact('user'));
    }
}
