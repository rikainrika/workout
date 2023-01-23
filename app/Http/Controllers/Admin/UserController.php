<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function add(){
      return view('admin.user.home');
    }
    
    public function create(Request $request)
    {
      $this->validate($request, User::$rules);
      $user = new User;
      $form = $request->all();
      $user->fill($form);
      $user->save();
      return redirect('/admin/homelogin');
    }
}
