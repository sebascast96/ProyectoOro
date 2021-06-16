<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'rs'=> Str::random(10),
            'commercial_name'=> Str::random(10),
            'rfc'=> Str::random(10),
            'curp'=> Str::random(10),
            'address'=> Str::random(10),
            'birthdate'=>Carbon::parse('2000-01-01')
        ]);
    }
}
