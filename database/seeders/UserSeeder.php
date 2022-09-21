<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'saimon',
            'email' => 'saimon@gmail.com',
            'role' => 'admin',
            'nation_id' => 1,
            'password' => Hash::make('saimon'),
        ]);
        User::factory()->create([
            'name' => 'mgmg',
            'email' => 'mgmg@gmail.com',
            'role' => 'admin',
            'nation_id' => 2,
            'password' => Hash::make('mgmg'),
        ]);
        User::factory()->create([
            'name' => 'ayeaye',
            'email' => 'ayeaye@gmail.com',
            'role' => 'author',
            'nation_id' => 3,
            'password' => Hash::make('ayeaye'),
        ]);
        User::factory()->create([
            'name' => 'agag',
            'email' => 'agag@gmail.com',
            'role' => 'editor',
            'nation_id' => 4,
            'password' => Hash::make('agag'),
        ]);
    }
}
