<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $primaryKey = 'poll_id';

    protected $fillable = [
        'poll_description', 'views',
    ];

    public function options()
    {
        return $this->hasMany(Option::class, 'poll_id')->select(['option_id', 'option_description']);
    }
}
