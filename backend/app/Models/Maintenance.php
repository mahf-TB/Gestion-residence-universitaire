<?php

namespace App\Models;

use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Maintenance extends Model
{
     
    use HasFactory;

    protected $fillable = [
        'type_probleme',
        'description',
        'status',       
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
