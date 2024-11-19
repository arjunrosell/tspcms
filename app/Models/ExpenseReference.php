<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseReference extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'status',
    ];
    public function expenseReference()
    {
        return $this->belongsTo(ExpenseReference::class, 'expense_references_id');
    }
}
