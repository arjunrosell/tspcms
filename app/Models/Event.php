<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'event_reference_id',
        'event_description',
        'date',
        'location',
        'status',
    ];

    public function event_reference()
    {
        return $this->belongsTo(EventReference::class, 'event_reference_id', 'id');
    }
}
