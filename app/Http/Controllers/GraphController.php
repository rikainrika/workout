<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Menu;

class GraphController extends Controller
{
    function show(Request $request){
		
	    //日付のラベル（x軸）
		$today = date('Y-m-d');
		$start = date('Y-m-d', strtotime($today . '-6 day'));
		$end = $today;

		// JSへ送るデータ
		$datas = [];
		$labels = [];

		for ($day = $start; $day <= $end; $day = date('Y-m-d', strtotime($day . '+1 day'))) {
    		$labels[] = $day;
        }
	    
	    //メニュー名だけ取ってラベル名にする
		$data_labels = \Auth::user()->menuNames();
		//configから色を渡す
		$colors = config('menu.colors');
		
			
		foreach($data_labels as $key => $data_label){
    	
    
    		for ($day = $start; $day <= $end; $day = date('Y-m-d', strtotime($day . '+1 day'))) {
        
        		$records = Record::where('user_id', \Auth::id())->where('name', $data_label)->where('created_at', '>=', $day . ' 00:00:00')
        		->where('created_at', '<', date('Y-m-d', strtotime($day . '+1 day')) . ' 00:00:00')->get();
        		$seconds = 0;
        		foreach($records as $record){
            		$seconds += $record->seconds;
        		}
        		$data[] = $seconds/60;
   
		    }
    
    		$datas[] = array('label' => $data_label, 'data' => $data, 'backgroundColor' => $colors[$key]);
    	
    		$data = [];
		}
  
	
		return view("admin.user.graph",[
		    
		    "labels" => $labels,
		    
		    "datas" => $datas
		  
		]);
	}
	
}
