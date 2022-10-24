<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilehistory extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rulues = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );
}