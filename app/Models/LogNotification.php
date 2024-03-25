<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogNotification extends Model
{
    use HasFactory;

    protected $fillable = ['category','message','type','user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function scopeLog($query){
        return $query->orderBy('id','desc')->with('user');
    }
}
