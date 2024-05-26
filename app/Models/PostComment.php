<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    public function user()
    {
        // 'belongsTo' is an Eloquent Method used to define a "belong to" relationship
        // The argument passed in the belongsTo passed, tells laravel which model the 'Post' belongs to.
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
