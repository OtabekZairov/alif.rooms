<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    'avatar', 
    'title', 
    'description'
    ];
    
    public function getImageAttribute()
	{
   		return $this->avatar;
	}

    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
