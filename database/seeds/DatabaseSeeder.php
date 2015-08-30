<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(FactorySeeder::class);

        Model::reguard();
    }
}


class UserTableSeeder extends Seeder
{
    public function run()
    {
        App\User::truncate();

        App\User::create([
            'role' => 'developer',
            'name' => 'shxfee',
            'email' => 'shxfee@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        App\User::create([
            'role' => 'developer',
            'name' => 'haris',
            'email' => 'haris@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        App\User::create([
            'role' => 'developer',
            'name' => 'inad',
            'email' => 'inad@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        App\User::create([
            'client_id' => 1,
            'role' => 'client',
            'name' => 'Visitmaldives',
            'email' => 'client@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 20)->create();

    }
}


class FactorySeeder extends Seeder
{
    public function run()
    {
        App\Project::truncate();
        App\Client::truncate();
        App\Backlog::truncate();

        factory(App\Project::class, 20)->create();
        factory(App\Client::class, 10)->create();
        factory(App\Backlog::class, 100)->create();

    }
}
