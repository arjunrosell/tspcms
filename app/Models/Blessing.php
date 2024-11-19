<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blessing extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'location',
        'date',
        'time',
        'contact_person_name_and_number',
        'blessed_item_and_count',
    ];
}
