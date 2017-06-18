<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isMine', function ($user, $ent) {
            return $user->id == $ent->user_id;
        });

        Gate::define('extendsMine', function ($user, $ent) {
            $match = false;
            $keys = array_keys( $ent['attributes'] );
            $rels = array_filter( $keys, function($val) { return substr($val, -3) == '_id'; } );
            foreach ( $rels as $key ) {
                $rel = substr( $key, 0, -3 );
                $match = $ent[$rel]['user_id'] && $ent[$rel]['attributes'] && $ent[$rel]['attributes']['user_id'] == $user->id ? true : $match;
            }
            return $match;
        });

    }
}
