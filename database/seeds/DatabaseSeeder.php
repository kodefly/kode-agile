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

        $this->call(FactorySeeder::class);

        Model::reguard();
    }
}


class FactorySeeder extends Seeder
{
    public function run()
    {
        App\User::truncate();
        App\Project::truncate();
        App\Client::truncate();

        factory(App\User::class, 20)->create();
        factory(App\Project::class, 20)->create();
        factory(App\Client::class, 10)->create();

        App\User::create([
            'role' => 'developer',
            'name' => 'developer',
            'email' => 'developer@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        App\User::create([
            'client_id' => 1,
            'role' => 'client',
            'name' => 'developer',
            'email' => 'client@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);
    }
}
