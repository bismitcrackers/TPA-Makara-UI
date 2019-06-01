<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_headmaster = Role::where('name', 'headmaster')->first();
        $role_teacher = Role::where('name', 'teacher')->first();
        $role_parent = Role::where('name', 'parent')->first();

        $headmaster = new User();
        $headmaster->name = 'Headmaster Name';
        $headmaster->email = 'headmaster@example.com';
        $headmaster->password = bcrypt('secret');
        $headmaster->save();
        $headmaster->roles()->attach($role_headmaster);

        $teacher = new User();
        $teacher->name = 'Teacher Name';
        $teacher->email = 'teacher@example.com';
        $teacher->password = bcrypt('secret');
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $parent = new User();
        $parent->name = 'Parent Name';
        $parent->email = 'parent@example.com';
        $parent->password = bcrypt('secret');
        $parent->save();
        $parent->roles()->attach($role_parent);
    }
}
