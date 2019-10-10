<?php

namespace App\Http\Controllers\Auth;

use App\Parents;
use App\Role;
use App\Student;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Override handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //
    //     event(new Registered($user = $this->create($request->all())));
    //
    //     // $this->guard()->login($user);
    //
    //     return $this->registered($request, $user)
    //                     ?: redirect($this->redirectPath());
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a ne user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role_orangtua = Role::where('name', 'Orangtua')->first();

        $user = new User;
        $user->name     = $data['namaLengkap'];
        $user->email    = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        $user->roles()->save($role_orangtua);

        $student = new Student;

        $fotoKK = WebHelper::saveImageToPublic($request->file('fotoKK'), '/picture/fotoKK');
        $fotoProfile = WebHelper::saveImageToPublic($request->file('fotoProfile'), '/picture/fotoProfile');

        $student->nama_lengkap      = $data['namaLengkap'];
        $student->nama_panggilan    = $data['namaPanggilan'];
        $student->kelas             = $data['kelas'];
        $student->jenis_kelamin     = $data['jenisKelamin'];
        $student->tempat_lahir      = $data['tempatLahir'];
        $student->tanggal_lahir     = $data['tanggalLahir'];
        $student->usia              = $data['usia'];
        $student->agama             = $data['agama'];
        $student->alamat_rumah      = $data['alamatRumah'];
        $student->telepon_rumah     = $data['teleponRumah'];
        $student->foto_kk           = $fotoKK;
        $student->foto_profile      = $fotoProfile;
        $student->anak_ke           = $data['anakKe'] . '/' . $data['anakDari'];
        $student->catatan_medis     = $data['catatanMedis'] . ' ' . $data['keteranganMedis'];
        $student->penyakit_berat    = $data['penyakit'];
        $student->keadaan_khusus    = $data['keadaan'];
        $student->sifat_baik        = $data['sifatBaik'];
        $student->sifat_diperhatikan= $data['sifatPerhatian'];
        $user->student()->save($student);
        // $student->save();

        $mother = new Parents;
        if ($request->has('fotoKTPIbu')) {
          $fotoKTPIbu = WebHelper::saveImageToPublic($request->file('fotoKTPIbu'), '/picture/fotoKTP');
        }
        $mother->peran            = 'Ibu';
        $mother->nama_lengkap     = $data['namaLengkapIbu'];
        $mother->tempat_lahir     = $data['tempatLahirIbu'];
        $mother->tanggal_lahir    = $data['tanggalLahirIbu'];
        $mother->agama            = $data['agamaIbu'];
        $mother->pendidikan       = $data['pendidikanTerakhirIbu'];
        $mother->jurusan          = $data['jurusanIbu'];
        $mother->pekerjaan        = $data['pekerjaanIbu'];
        $mother->alamat_kantor    = $data['alamatKerjaIbu'];
        $mother->telepon_kantor   = $data['teleponKantorIbu'];
        $mother->email            = $data['emailIbu'];
        $mother->alamat_rumah     = $data['alamatRumahIbu'];
        $mother->no_handphone     = $data['nomorHpIbu'];
        if ($request->has('fotoKTPIbu')) {
          $mother->foto_ktp        = $fotoKTPIbu;
        }
        $user->student()->save($mother);
        // $mother->save();

        $father = new Parents;
        if ($request->has('fotoKTPAyah')) {
          $fotoKTPAyah = WebHelper::saveImageToPublic($request->file('fotoKTPAyah'), '/picture/fotoKTP');
        }
        $father->peran             = 'Ayah';
        $father->nama_lengkap      = $data['namaLengkapAyah'];
        $father->tempat_lahir      = $data['tempatLahirAyah'];
        $father->tanggal_lahir     = $data['tanggalLahirAyah'];
        $father->agama             = $data['agamaAyah'];
        $father->pendidikan        = $data['pendidikanTerakhirAyah'];
        $father->jurusan           = $data['jurusanAyah'];
        $father->pekerjaan         = $data['pekerjaanAyah'];
        $father->alamat_kantor     = $data['alamatKerjaAyah'];
        $father->telepon_kantor    = $data['teleponKantorAyah'];
        $father->email             = $data['emailAyah'];
        $father->alamat_rumah      = $data['alamatRumahAyah'];
        $father->no_handphone      = $data['nomorHpAyah'];
        if ($request->has('fotoKTPIbu')) {
          $father->foto_ktp          = $fotoKTPAyah;
        }
        $user->student()->save($father);
        // $father->save();

        $wali = new Parents;
        $wali->peran             = 'Wali';
        $wali->nama_lengkap      = $data['namaLengkapWali'];
        $wali->tempat_lahir      = $data['tempatLahirWali'];
        $wali->tanggal_lahir     = $data['tanggalLahirWali'];
        $wali->agama             = $data['agamaWali'];
        $wali->pendidikan        = $data['pendidikanTerakhirWali'];
        $wali->jurusan           = $data['jurusanWali'];
        $wali->pekerjaan         = $data['pekerjaanWali'];
        $wali->alamat_kantor     = $data['alamatKerjaWali'];
        $wali->telepon_kantor    = $data['teleponKantorWali'];
        $wali->email             = $data['emailWali'];
        $wali->alamat_rumah      = $data['alamatRumahWali'];
        $wali->no_handphone      = $data['nomorHpWali'];
        $user->student()->save($wali);
        // $wali->save();

        $nonwali = new Parents;
        $nonwali->peran             = 'Non-wali';
        $nonwali->nama_lengkap      = $data['namaLengkapNonWali'];
        $nonwali->telepon_kantor    = $data['teleponRumahNonWali'];
        $nonwali->email             = $data['emailNonWali'];
        $nonwali->no_handphone      = $data['nomorHpNonWali'];
        $user->student()->save($nonwali);
        // $nonwali->save();

        // $user
        //     ->roles()
        //     ->attach(Role::where('name', 'Orangtua')->first());
        // $user->student()->save($student);
        // $user->parents()->saveMany([$mother, $father, $wali, $nonwali]);
        //
        // $student->user()->associate($user)->save();
        // $mother->user()->associate($user)->save();
        // $father->user()->associate($user)->save();
        // $wali->user()->associate($user)->save();
        // $nonwali->user()->associate($user)->save();
        return $user;
    }
}
