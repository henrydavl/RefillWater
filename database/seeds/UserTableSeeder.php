<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Henry';
        $user->email = 'henry@root.com';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 1; #root
        $user->is_verified = '1';
        $user->save();

        $user = new User();
        $user->name = 'Henry';
        $user->email = 'henry@admin.com';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 2; #admin
        $user->is_verified = '1';
        $user->save();

        $user = new User();
        $user->name = 'Henry';
        $user->email = 'henry@bureau.com';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 3; #bureau
        $user->is_verified = '1';
        $user->save();
    }
}
