<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'CODE',
        'JM_DATE',
        'EC_DATE',
        'EC_JOUR',
        'NUM_PIECE',
        'NUM_FACT',
        'REF',
        'CG_NUM',
        'CT_NUM',
        'EC_MONTANT',
        'LIBELLE_ECRITURE',
        'EC_SENS',
        'CLIENT',
        'TYPE_VERSEMENT',
        'VALIDE'
    ];
}
