<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'income_references_id',
        'amount',
        'remarks',
        'address',
        'received_from',
        'received_by',
    ];

    public function income_references()
    {
        return $this->belongsTo(IncomeReference::class, 'income_references_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'received_by', 'id');
    }
}
