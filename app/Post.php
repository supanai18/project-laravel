<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'post_image',
        'post_title',
        'post_intro',
        'post_creator',
        'post_address',
        'post_rate',
        'post_status',
        'post_description',
        'post_price',
        'post_payment',
        'post_time',
        'post_start',
        'post_end',
        'post_view',
        'post_like',
        'post_unlike',
        'post_date',
        'post_start_date',
        'post_end_date',
        'post_start_time',
        'post_end_time',
        'post_personal',
        'post_id_card',
        'post_cert',
        'post_per_address',
        'post_tel',
    ];
}
