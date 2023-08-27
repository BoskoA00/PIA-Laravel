<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polaganje extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'Id_Polaznika',
        'Id_Kursa',
        'Datum_Polaganja',
        'Rezultat',
        'Ocena'
    ];

    use HasFactory;
}
