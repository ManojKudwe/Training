<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('user')->insert([
		'firstname' => "Admin",
		'lastname' => "admin",
		'email' => "Admin@admin.com",
		'password' => MD5("admin123"),
		'Role' => "Admin",
		'status' => "Active",
		]);
    }
}
