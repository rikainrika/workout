<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(){
       
        $menus= Menu::where('user_id', '=', Auth::user()->id)->orderBy('order', 'asc')->get();
        return view('admin.user.homeselect', ['menus' => $menus]);
    }
    
    public function store(Request $request){
      
      $this->validate($request, Menu::$rules);
      foreach ($request->menus as $k => $menuName){ 
   
        if($menuName){
          $menu = Menu::where('order', '=', $k + 1)->first();    
          if($menu) {
            $menu->name = $menuName;
            $menu->user_id = Auth::user()->id;
            $menu->save(); 
          }else{
            $menu = new Menu();
            $menu->order = $k + 1;
            $menu->name = $menuName;
            $menu->user_id = Auth::user()->id;
            $menu->save(); 
          }
        }
      }
      
      return redirect('/admin/setting');
      
    }
}
