<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_headmaster = new Role();
        $role_headmaster->name = 'headmaster';
        $role_headmaster->description = 'A Head of Teachers User';
        $role_headmaster->save();

        $role_teacher = new Role();
        $role_teacher->name = 'teacher';
        $role_teacher->description = 'A Teacher User';
        $role_teacher->save();

        $role_parent = new Role();
        $role_parent->name = 'parent';
        $role_parent->description = 'A Parent User';
        $role_parent->save();
    }
}
