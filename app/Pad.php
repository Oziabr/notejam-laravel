<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pad extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function scopeIsMine(Builder $query)
    {
        $query->where('user_id', Auth::id());
    }

}
