<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'qte',
        'image',
        'id_user',
        'logement_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function logement()
    {
        return $this->belongsTo(Logement::class, 'logement_id');
    }
}
