<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'donation_references_id',
        'category',
        'name',
        'amount',
        'date',
        'status',
    ];

    public function donation_reference()
    {
        return $this->belongsTo(DonationReference::class, 'donation_references_id', 'id');
    }
}
