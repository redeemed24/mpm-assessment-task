<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	"name" => "Admin",
        	"email" => "admin@mpm.com",
        	"password" => bcrypt('admin')
        ]);
    }
}
