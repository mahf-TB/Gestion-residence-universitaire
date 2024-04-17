<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Publication extends Model
{
    use HasFactory;


    protected $fillable = [
        'contenu',
        'nb_like',
        'nb_commentaire',
        'image',       
        'id_service',
        'auteur',
    ];


    public function auteurPub()
    {
        return $this->belongsTo(User::class, 'auteur');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }


    public function imageUrl(): string
    {
        return Storage::disk('public')->url($this->image);
    }

}
