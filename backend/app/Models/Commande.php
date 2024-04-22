<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_service',
        'nombre',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
