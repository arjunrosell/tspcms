<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_wedding',
        'time_wedding',
        'type_wedding',
        'date_application',
        'groom_name',
        'groom_age',
        'groom_bday',
        'groom_father',
        'groom_mother',
        'groom_address',
        'groom_contact_no',
        'groom_place_baptism',
        'groom_parish_of',
        'groom_date_bap',
        'groom_book_no_1',
        'groom_line_no_1',
        'groom_page_no_1',
        'groom_place_confirm',
        'groom_parish_confirm',
        'groom_date_confirm',
        'groom_book_no_2',
        'groom_line_no_2',
        'groom_page_no_2',
        'bride_name',
        'bride_age',
        'bride_bday',
        'bride_father',
        'bride_mother',
        'bride_address',
        'bride_contact_no',
        'bride_place_baptism',
        'bride_parish_of',
        'bride_date_bap',
        'bride_book_no_1',
        'bride_line_no_1',
        'bride_page_no_1',
        'bride_place_confirm',
        'bride_parish_confirm',
        'bride_date_confirm',
        'bride_book_no_2',
        'bride_line_no_2',
        'bride_page_no_2',
    ];
}
