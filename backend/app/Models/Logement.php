<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_logement',
        'type_logement',
        'prix',
        'status',
        'image',
        'id_batiment',
    ];

    public function batiment()
    {
        return $this->belongsTo(Batiment::class, 'id_batiment');
    }

}
