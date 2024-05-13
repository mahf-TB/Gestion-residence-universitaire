<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'read',
        'id_send',
        'id_receive',
    ];

    public function user_send()
    {
        return $this->belongsTo(User::class, 'id_send');
    }

    
    public function user_receive()
    {
        return $this->belongsTo(User::class, 'id_receive');
    }


}
