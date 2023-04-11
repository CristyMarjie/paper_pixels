<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = People::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'address1' => 'bajada'
        ]);

        $person->user()->create([
            'email' => 'Admin@dsgsonsgroup.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1
        ]);


        // $person = People::create([
        //     'first_name' => 'John',
        //     'last_name' => 'User',
        //     'address1' => 'Bajada'
        // ]);

        // $user = $person->user()->create([
        //     'email' => 'john@dsgsonsgroup.com',
        //     'password' => Hash::make('password123'),
        //     'role_id' => 4
        // ]);

        // $user->tenant()->create([
        //     'tenant_number' => '1223'
        // ]);


    }
}
