<?php

use Illuminate\Database\Seeder;
use App\Pengguna;

class SeederPengguna extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Pengguna;
        $user->username = "edokaton";        
        $user->password = Hash::make("edokaton32");
        $user->api_token = str_random(100);

        $user->save();
    }
}
