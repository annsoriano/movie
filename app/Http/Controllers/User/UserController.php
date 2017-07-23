<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\User;
use App\Entry;


class UserController extends Controller
{
    public function showProfile(){
    	$user=auth()->user();
    	$entry=Entry::orderBy('title','asc')->get();
    	return view('user.profile', compact('user','entry'));
    }
}
