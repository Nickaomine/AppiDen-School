<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectations extends Model
{
    use HasFactory;
    protected $fillable = [
        'personnel_id',
        'vehicule_id',
        'date_affectation',
        'date_retour',
    ];
   
}
