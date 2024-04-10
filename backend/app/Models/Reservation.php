<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_debut',
        'date_fin',
        'status',       
        'email',
        'id_etudiant',
        'id_logement',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }
    public function logement()
    {
        return $this->belongsTo(Logement::class, 'id_logement');
    }
}
