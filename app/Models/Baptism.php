<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baptism extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_of_child',
        'date_of_birth',
        'date_of_baptism',
        'place_of_birth',
        'legitimacy',
        'father_name',
        'father_place',
        'mother_name',
        'mother_place',
        'residence',
        'godfathers',
        'godmothers',
        'minister_of_baptism',
        'parish_priest',
        'name_of_baptized',
        'date_today',
        'offering',
        'remarks',
    ];
}
