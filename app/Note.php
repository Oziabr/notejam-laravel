<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function scopeExtendsMine(Builder $query)
    {
        return $query->whereHas('pad', function (Builder $q) {
            $q->where('user_id', Auth::id());
        });
    }

}
