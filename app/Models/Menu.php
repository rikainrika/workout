<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    public static $rules = array(
        'menus' => 'array',
    );
    
    public static function getLabels($user_id) {
        return self::where('user_id', $user_id)->orderBy('order')->get()->pluck('name')->toArray();
    }
}
