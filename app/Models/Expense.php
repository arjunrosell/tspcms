<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'expense_references_id',
        'amount',
        'remarks',
        'status',
        'date',
        'event_description',
        'location',
        'files',
    ];

    public function expense_references()
    {
        return $this->belongsTo(ExpenseReference::class, 'expense_references_id', 'id');
    }
}
