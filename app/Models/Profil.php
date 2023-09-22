<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
//     initialise la table  et les champs
    protected $fillable = ['nom', 'prenom', 'sexe', 'date_naissance', 'pays', 'photoPath'];
}
