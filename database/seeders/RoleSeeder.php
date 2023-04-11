<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultRole = ['Admin','Finance','Leasing','Tenant','TRMO'];

        foreach($defaultRole as $role){
                Role::create(['description' => $role]);
        }
    }
}
