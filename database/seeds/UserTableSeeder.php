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
        $role_administrator = Role::where('name', 'Administrator')->first();
        $role_koordinator = Role::where('name', 'Koordinator')->first();
        $role_wakil_koordinator = Role::where('name', 'Wakil Koordinator')->first();
        $role_staf_administrasi = Role::where('name', 'Staf Administrasi')->first();
        $role_fasilitator = Role::where('name', 'Fasilitator')->first();
        $role_cofasilitator = Role::where('name', 'Co-fasilitator')->first();
        $role_guru = Role::where('name', 'Guru')->first();
        $role_orangtua = Role::where('name', 'Orangtua')->first();

        $administrator = new User();
        $administrator->name = 'Administrator Name';
        $administrator->email = 'administrator@example.com';
        $administrator->password = bcrypt('secret');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);

        $koordinator = new User();
        $koordinator->name = 'Koordinator Name';
        $koordinator->email = 'koordinator@example.com';
        $koordinator->password = bcrypt('secret');
        $koordinator->save();
        $koordinator->roles()->attach($role_koordinator);

        $wakil_koordinator = new User();
        $wakil_koordinator->name = 'Wakil Koordinator Name';
        $wakil_koordinator->email = 'wakil_koordinator@example.com';
        $wakil_koordinator->password = bcrypt('secret');
        $wakil_koordinator->save();
        $wakil_koordinator->roles()->attach($role_wakil_koordinator);

        $staf_administrasi = new User();
        $staf_administrasi->name = 'Staf Administrasi Name';
        $staf_administrasi->email = 'staf_administrasi@example.com';
        $staf_administrasi->password = bcrypt('secret');
        $staf_administrasi->save();
        $staf_administrasi->roles()->attach($role_staf_administrasi);

        $fasilitator = new User();
        $fasilitator->name = 'Fasilitator Name';
        $fasilitator->email = 'fasilitator@example.com';
        $fasilitator->password = bcrypt('secret');
        $fasilitator->save();
        $fasilitator->roles()->attach($role_fasilitator);

        $cofasilitator = new User();
        $cofasilitator->name = 'Co-fasilitator Name';
        $cofasilitator->email = 'cofasilitator@example.com';
        $cofasilitator->password = bcrypt('secret');
        $cofasilitator->save();
        $cofasilitator->roles()->attach($role_cofasilitator);

        $guru = new User();
        $guru->name = 'Guru Name';
        $guru->email = 'guru@example.com';
        $guru->password = bcrypt('secret');
        $guru->save();
        $guru->roles()->attach($role_guru);

        $orangtua = new User();
        $orangtua->name = 'Orangtua Name';
        $orangtua->email = 'orangtua@example.com';
        $orangtua->password = bcrypt('secret');
        $orangtua->save();
        $orangtua->roles()->attach($role_orangtua);
    }
}
