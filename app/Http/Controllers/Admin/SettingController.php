<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function add(){
        $menusTmp = Menu::where('user_id', '=', Auth::user()->id)->get();
        $menus = [];
        foreach ($menusTmp as $menu){
          $menus[$menu->order] = $menu;
        }
        return view('admin.user.setting', ['menus' => $menus]);
    }

    
    public function create(Request $request)
    {
      $setting = Setting::where('user_id', '=', Auth::id())->first();
      if($setting){
        $setting->seconds = $request->seconds;
      } else{
        $setting = new Setting;
        $form = $request->all();
        $setting->fill($form);
        $setting->user_id = Auth::id();
      }
      $setting->save(); 
      return redirect('/admin/setting');
    }
}
