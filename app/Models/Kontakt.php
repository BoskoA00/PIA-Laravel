<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontakt extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'ImeP',
        'PrezimeP',
        'BrojT',
        'Eadresa',
        'Slika'
    ];
    use HasFactory;
}
