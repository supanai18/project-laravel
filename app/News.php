<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'news_image',
        'news_title',
        'news_intro',
        'news_description',
        'news_creator',
        'news_view',
    ];
}
