<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert(array(array(
		'role_name' => "superadmin"	,
		),
		array(
		'role_name' => "admin"	,
		),
		array(
		'role_name' => "inventory manager"	,
		),
		array(
		'role_name' => "order manager"	,
		),
		array(
		'role_name' => "customer"	,
		)
		));
    }
}
