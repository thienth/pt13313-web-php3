<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
    	'title', 'image', 'content',
    	'publish_date', 'status',
    	'author_id'
    ];
}
