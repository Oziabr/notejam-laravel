<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 3)->create();

        App\User::all()->each(function ($u) {
            $u->pads()->save(factory(App\Pad::class)->make());
            $u->pads()->save(factory(App\Pad::class)->make());
            $u->pads()->save(factory(App\Pad::class)->make());
            $u->pads()->save(factory(App\Pad::class)->make());
            $u->pads()->save(factory(App\Pad::class)->make());
        });

        App\Pad::all()->each(function ($p) {
            $p->notes()->save(factory(App\Note::class)->make());
            $p->notes()->save(factory(App\Note::class)->make());
            $p->notes()->save(factory(App\Note::class)->make());
            $p->notes()->save(factory(App\Note::class)->make());
            $p->notes()->save(factory(App\Note::class)->make());
        });

    }
}
