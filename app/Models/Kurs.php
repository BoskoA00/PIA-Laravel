<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    public $timestamps=false; 
    protected $fillable =[
        'ImeKursa',
        'ImeProfesora',
        'OpisKursa',
        'PrilozeniMaterijal',
        'Id_Profesora'
    ];
    use HasFactory;
}
