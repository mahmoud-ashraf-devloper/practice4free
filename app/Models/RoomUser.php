<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomUser extends Pivot
{
    use HasFactory;

    protected $table = 'room_user';
    protected $primaryKey = 'user_id';
    protected $increments = false;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'room_id',
        'is_co_owner'
    ];
}
