<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'training_name',
        'training_lastname',
        'training_email',
        'training_tel',
        'training_career',
        'training_religion',
        'training_status',
    ];
}
