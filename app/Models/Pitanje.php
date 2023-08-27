<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitanje extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'Pitanje',
        'Odgovor1',
        'Odgovor2',
        'Odgovor3',
        'Odgovor4',
        'TacanOdgovor',
        'Id_Kursa',
        'Tezina'
    ];

    use HasFactory;
}
