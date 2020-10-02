<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $primaryKey = 'option_id';

    protected $fillable = [
        'option_description', 'poll_id',
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'option_id');
    }
}
