<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_date',
        'wedding_time',
        'wedding_type',
        'application_date',

        // Groom's information
        'groom_name',
        'groom_age',
        'groom_birthday',
        'groom_father',
        'groom_mother',
        'groom_address',
        'groom_contact',
        'groom_baptism',
        'groom_baptism_parish',
        'groom_baptism_date',
        'groom_confirmation',
        'groom_confirmation_parish',
        'groom_confirmation_date',

        // Bride's information
        'bride_name',
        'bride_age',
        'bride_birthday',
        'bride_father',
        'bride_mother',
        'bride_address',
        'bride_contact',
        'bride_baptism',
        'bride_baptism_parish',
        'bride_baptism_date',
        'bride_confirmation',
        'bride_confirmation_parish',
        'bride_confirmation_date',
    ];
}
