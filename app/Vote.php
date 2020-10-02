<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $primaryKey = 'vote_id';

    protected $fillable = [
        'option_id', 'qty',
    ];

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }
}
