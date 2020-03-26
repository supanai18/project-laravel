<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'contact_name',
        'contact_email',
        'contact_description',
    ];
}
