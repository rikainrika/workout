<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Menu;

class RecordsController extends Controller
{
     public function add(Request $request){
         
        $name = $request->input('name');
        return view('admin.user.timer', ['name' => $name]);
    }
    
    //タイマーで計ったデータを保存する
    public function graph(Request $request){
        $seconds = $request->input('seconds');
        $name = $request->input('name');
        $user_id = \Auth::id();
        $record = new Record();
        $record->user_id = $user_id;
        $record->name = $name;
        $record->seconds = $seconds;
        $record->save();
        return redirect('/graph');
    }  
    
    //ポップアップ表示時の処理
    public function complete(Request $request){
        $seconds = $request->input('seconds');
        $name = $request->input('name');
        return view('admin.user.complete', compact(['name', 'seconds']));
    }
}
