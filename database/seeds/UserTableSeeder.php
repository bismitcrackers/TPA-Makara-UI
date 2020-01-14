<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Student;
use App\Parents;
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

        $administrator = new User();
        $administrator->name = 'TPA Makara Administrator';
        $administrator->email = 'administrator@tpam.psikologi.ui.ac.id';
        $administrator->password = bcrypt('VynsYp');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);

        $koordinator = new User();
        $koordinator->name = 'EFRIYANI DJUWITA, S.Psi., M.Si., Psikolog';
        $koordinator->email = 'efriyani_djuwita@tpam.psikologi.ui.ac.id';
        $koordinator->password = bcrypt('xygSWW');
        $koordinator->save();
        $koordinator->roles()->attach($role_koordinator);

        $wakil_koordinator = new User();
        $wakil_koordinator->name = 'BETTI ASTRIANI, S.Psi., M.Si';
        $wakil_koordinator->email = 'betti_astriani@tpam.psikologi.ui.ac.id';
        $wakil_koordinator->password = bcrypt('XYX4QU');
        $wakil_koordinator->save();
        $wakil_koordinator->roles()->attach($role_wakil_koordinator);

        $wakil_koordinator = new User();
        $wakil_koordinator->name = 'MAULIDA KURNIASARI, S.Hum., M.Psi-T';
        $wakil_koordinator->email = 'maulida_kurniasari@tpam.psikologi.ui.ac.id';
        $wakil_koordinator->password = bcrypt('stmXM6');
        $wakil_koordinator->save();
        $wakil_koordinator->roles()->attach($role_wakil_koordinator);

        $staf_administrasi = new User();
        $staf_administrasi->name = 'FITRI IZZATI';
        $staf_administrasi->email = 'fitri_izzati@tpam.psikologi.ui.ac.id';
        $staf_administrasi->password = bcrypt('HSzbGh');
        $staf_administrasi->save();
        $staf_administrasi->roles()->attach($role_staf_administrasi);

        $fasilitator = new User();
        $fasilitator->name = 'IDA YANUARTI, S.Psi';
        $fasilitator->email = 'ida_yanuarti@tpam.psikologi.ui.ac.id';
        $fasilitator->password = bcrypt('U3mszt');
        $fasilitator->save();
        $fasilitator->roles()->attach($role_fasilitator);

        $cofasilitator = new User();
        $cofasilitator->name = 'NUR SOPHIA DEWI LESTARI, S.Mn';
        $cofasilitator->email = 'nur_sophia_d_l@tpam.psikologi.ui.ac.id';
        $cofasilitator->password = bcrypt('6UHfsT');
        $cofasilitator->save();
        $cofasilitator->roles()->attach($role_cofasilitator);

        $cofasilitator = new User();
        $cofasilitator->name = 'SUSI ROSIANA DEWI, S.Hum';
        $cofasilitator->email = 'susi_rosiana_d@tpam.psikologi.ui.ac.id';
        $cofasilitator->password = bcrypt('QT92d2');
        $cofasilitator->save();
        $cofasilitator->roles()->attach($role_cofasilitator);

        $cofasilitator = new User();
        $cofasilitator->name = 'PUTI AULIA RAHMA, S.Psi';
        $cofasilitator->email = 'puti_aulia_r@tpam.psikologi.ui.ac.id';
        $cofasilitator->password = bcrypt('dD82s5');
        $cofasilitator->save();
        $cofasilitator->roles()->attach($role_cofasilitator);

        $guru = new User();
        $guru->name = 'ANNA RATNA UTAMI, S.H.I';
        $guru->email = 'anna_ratna_u@tpam.psikologi.ui.ac.id';
        $guru->password = bcrypt('mV6RX9');
        $guru->save();
        $guru->roles()->attach($role_guru);

        $guru = new User();
        $guru->name = 'MARIANI, S.Pd';
        $guru->email = 'mariani@tpam.psikologi.ui.ac.id';
        $guru->password = bcrypt('YeuMNq');
        $guru->save();
        $guru->roles()->attach($role_guru);

        $guru = new User();
        $guru->name = 'ROSANA YUNIASIH, S.Psi';
        $guru->email = 'rosana_yuniasih@tpam.psikologi.ui.ac.id';
        $guru->password = bcrypt('nRJ6Rh');
        $guru->save();
        $guru->roles()->attach($role_guru);

        $kelas = array(
            'Day Care',
            'Kelompok Bermain',
        );

        $kota = array(
            'Jakarta',
            'Depok',
            'Bogor',
            'Tangerang',
            'Tangerang Selatan',
        );

        $jenis_kelamin = array(
            'laki-laki',
            'perempuan',
        );

        $agama = array(
            'Islam',
            'Kristen',
            'Hindu',
            'Budha',
        );

        $anakKe = array(
            '1/2',
            '2/2',
            '1/3',
            '2/3',
            '3/3',
            '1/4',
            '2/4',
            '3/4',
            '4/4',
        );

        $peran = array(
            'Ibu',
            'Ayah',
            'Wali',
            'Non-wali'
        );

        $pendidikan = array(
            'SD',
            'SMP',
            'SMA',
            'D1',
            'D2',
            'D3',
            'D4',
            'S1',
            'S2',
            'S3',
        );

        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 80; $i++) {
            $user = new User();
            $user->name     = $faker->name;
            $user->email    = $faker->email;
            $user->password = bcrypt('secret');
            $user->save();
            $user->roles()->save($role_orangtua);

            $student = new Student();
            $student->nama_lengkap      = $faker->name;
            $student->nama_panggilan    = $faker->firstName;
            $student->kelas             = $kelas[array_rand($kelas)];
            $student->jenis_kelamin     = $jenis_kelamin[array_rand($jenis_kelamin)];
            $student->tempat_lahir      = $kota[array_rand($kota)];
            $student->tanggal_lahir     = $faker->dateTime($max = 'now', $timezone = null);
            $student->usia              = $faker->randomDigit;
            $student->agama             = $agama[array_rand($agama)];
            $student->alamat_rumah      = $faker->address;
            $student->telepon_rumah     = $faker->phoneNumber;
            $student->anak_ke           = $anakKe[array_rand($anakKe)];
            $student->catatan_medis     = $faker->sentence;
            $student->penyakit_berat    = $faker->word;
            $student->keadaan_khusus    = $faker->word;
            $student->sifat_baik        = $faker->word;
            $student->sifat_diperhatikan= $faker->word;
            $student->lulus             = $faker->boolean($chanceOfGettingTrue = 5);
            $user->student()->save($student);
            // $student->save();

            foreach ($peran as $p) {
                $parent = new Parents();
                $parent->peran            = $p;
                $parent->nama_lengkap     = $faker->name;
                $parent->tempat_lahir     = $kota[array_rand($kota)];
                $parent->tanggal_lahir    = $faker->dateTime($max = 'now', $timezone = null);
                $parent->agama            = $agama[array_rand($agama)];
                $parent->pendidikan       = $pendidikan[array_rand($pendidikan)];
                $parent->jurusan          = $faker->word;
                $parent->pekerjaan        = $faker->jobTitle;
                $parent->alamat_kantor    = $faker->address;
                $parent->telepon_kantor   = $faker->phoneNumber;
                $parent->email            = $faker->email;
                $parent->alamat_rumah     = $faker->address;
                $parent->no_handphone     = $faker->phoneNumber;
                $user->student()->save($parent);
            }

    	}
    }
}
