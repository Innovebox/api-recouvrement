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
    ];

    protected $casts = [
        'is_valide' => 'boolean'
    ];


}
