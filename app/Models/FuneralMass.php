<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuneralMass extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'deceased_name',
        'death_date',
        'burial_date',
        'departure_time',
        'birth_date',
        'age',
        'spouse_name',
        'place_of_origin',
        'cause_of_death',
        'mass_time',
        'burial_place',
        'registrant_name',
        'contact_number',
        'celebration_place',
    ];
}
