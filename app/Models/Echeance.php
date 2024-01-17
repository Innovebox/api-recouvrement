<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
    use HasFactory;

    protected $table = "dbo.recouvrement";

    public $timestamps = false;


    protected $primaryKey = 'DR_No'; // or null

    public $incrementing = false;


    public $fillable = [
        'synchroniser',
        'date_synchronisation' ,
        'synchroniser_par' 
    ];

}
