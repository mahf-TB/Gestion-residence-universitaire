<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_service',
        'nom_service',
        'description',
        'tarifs',       
        'disponible',       
        'image',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function imageUrl(): string
    {
        return Storage::disk('public')->url($this->image);
    }

}
