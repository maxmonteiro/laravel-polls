<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $primaryKey = 'poll_id';

    protected $fillable = [
        'poll_description', 'views',
    ];
}