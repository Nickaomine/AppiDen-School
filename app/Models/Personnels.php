<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prenom',
        'date',
        'adresse',
        'phone',
        'email',
        'postes',
        'departement',
        'dateembau',
        'statut',
        'statusperso',
        'permis',
        'dateexpermis',
        'typepermis',

    ];
}
