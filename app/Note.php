<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'text'
    ];

    public function pad()
    {
        return $this->belongsTo('App\Pad');
    }

}
