<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'title',
        'topic',
        'size',
        'owner_id',
        'language_id'
    ];

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'owner_id');
    }

}
