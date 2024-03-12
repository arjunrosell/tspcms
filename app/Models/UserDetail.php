<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class UserDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'profile',
        'fname',
        'mname',
        'lname',
        'nickname',
        'position_id',
        'DOB',
        'gender',
        'contact_no',
        'permanent_address',
    ];

    public function getfullNameAttribute()
    {
        if (is_null($this->mname)) {
            return Str::upper($this->fname . ' ' . $this->lname);
        } else {
            return Str::upper($this->fname . ' ' . $this->mname . '. ' . $this->lname);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_detail_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'id', 'position_id');
    }
}
