<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'room_id',
    'username',
    'started_at',
    'ends_in',
    'comment',
    'is_busy'
    ];

    public function rooms(){
    	return $this->belongsTo(Room::class);
    }

    
}
