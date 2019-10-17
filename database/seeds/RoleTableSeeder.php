<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "Root";
        $role->description = "Highest level of Administrator aka developer (Level 1)";
        $role->save();

        $role = new Role();
        $role->name = "Admin";
        $role->description = "Administrator level 2 for manage balance top-up (SU, Academic Support, etc)";
        $role->save();

        $role = new Role();
        $role->name = "Bureau";
        $role->description = "Administrator level 3 - manage balance top-up (Royalty) ex: BAA, BMA, Library, etc";
        $role->save();

        $role = new Role();
        $role->name = "User";
        $role->description = "Regular user";
        $role->save();
    }
}
