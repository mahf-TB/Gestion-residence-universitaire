<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'cin',
        'telephone',
        'email',
        'id_logement',
    ];

    public function logement()
    {
        return $this->belongsTo(Logement::class, 'id_logement');
    }
}
