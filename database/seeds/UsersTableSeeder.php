<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = new Role;
        $adminRole->name="Administrator";
        $adminRole->display_name="Administrator";
        $adminRole->save();

        $memberRole = new Role;
        $memberRole->name="Member";
        $memberRole->display_name="Member";
        $memberRole->save();

        // Membuat sample admin
        $admin = new User();
        $admin->name='Administrator';
        $admin->email='admin@gmail.com';
        $admin->password=bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        $member = new User();
        $member->name='Member';
        $member->email='member@gmail.com';
        $member->password=bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);
    }
}
