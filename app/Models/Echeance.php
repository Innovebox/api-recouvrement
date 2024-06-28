<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Echeance extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "dbo.recouvrement";

    public $timestamps = false;


    protected $primaryKey = 'DR_No'; // or null

    public $incrementing = false;


    public $fillable = [
        'synchroniser',
        'date_synchronisation' ,
        'synchroniser_par',
        'is_valide',
        'valider_par',
        'valider_le',
        'observation',
        'DR_Montant',
        'DO_Piece',
        'matricule',
        'prenom_nom',
        'telephone',
        'numero_recu',
        'montant_recu',
        'is_recu'
    ];

    protected $casts = [
        'date_synchronisation' => 'datetime',
        'valider_le' => 'datetime',
        'DR_Date' => 'datetime',
        'DO_Date' => 'date',
        'is_valide' => 'boolean',
        'is_recu' => 'boolean'
    ];


}
