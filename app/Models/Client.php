<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "dbo.Clients";

    public $timestamps = false;


    protected $primaryKey = 'id'; // or null

    public $incrementing = false;



}
