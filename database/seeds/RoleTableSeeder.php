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
        $role_administrator = new Role();
        $role_administrator->name = 'Administrator';
        $role_administrator->description = 'Full Access';
        $role_administrator->save();

        $role_koordinator = new Role();
        $role_koordinator->name = 'Koordinator';
        $role_koordinator->description = 'Full Access';
        $role_koordinator->save();

        $role_wakil_koordinator = new Role();
        $role_wakil_koordinator->name = 'Wakil Koordinator';
        $role_wakil_koordinator->description = 'Full Access';
        $role_wakil_koordinator->save();

        $role_staf_administrasi = new Role();
        $role_staf_administrasi->name = 'Staf Administrasi';
        $role_staf_administrasi->description = 'Full Access';
        $role_staf_administrasi->save();

        $role_fasilitator = new Role();
        $role_fasilitator->name = 'Fasilitator';
        $role_fasilitator->description = 'Can Write and Publish Daily Books and Give Comments for All Classes';
        $role_fasilitator->save();

        $role_cofasilitator = new Role();
        $role_cofasilitator->name = 'Co-fasilitator';
        $role_cofasilitator->description = 'Can Write Daily Books and Give Comments for Daycare Class';
        $role_cofasilitator->save();

        $role_guru = new Role();
        $role_guru->name = 'Guru';
        $role_guru->description = 'Can Write Daily Books and Give Comments for Kelompok Bermain Class';
        $role_guru->save();

        $role_orangtua = new Role();
        $role_orangtua->name = 'Orangtua';
        $role_orangtua->description = 'Can Read Daily Books and Give Comments';
        $role_orangtua->save();
    }
}
