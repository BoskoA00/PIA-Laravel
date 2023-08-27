<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vest extends Model
{
    protected $fillable = ['Naslov', 'Opis'];
   
    
    use HasFactory;
}
