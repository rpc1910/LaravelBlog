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

        factory('App\User')->create([
            'name' => "Rodrigo",
            'email' => "rodrigo@rodrigop.com.br",
            'password' => bcrypt("12345"),
            'remember_token' => str_random(10),
        ]);

        $this->call(PostsTableSeeders::class);
        $this->call(TagTableSeeder::class);

        Model::reguard();
    }
}
