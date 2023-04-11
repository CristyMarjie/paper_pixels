<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultLoc = ['DEFAULT','GMDV','GMTR','GMDG','GMTG','GMGS'];

        foreach($defaultLoc as $location){
                Location::create(['location' => $location]);
        }
    }
}
