<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuneralMass extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'pangalan_ng_namatay',
        'petsa_ng_kamatayan',
        'petsa_ng_libing',
        'oras_ng_alis',
        'edad',
        'pangalan_ng_asawa',
        'taga_saan',
        'sanhi_ng_kamatayan',
        'oras_ng_misa',
        'saan_ililibing',
        'pangalan_ng_nagpalista',
        'contact_no',
        'taga_pagdiwang',
        'status',
    ];
}
