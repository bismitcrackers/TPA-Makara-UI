<?php

namespace App\Http\Controllers\Auth;

use App\Parents;
use App\Role;
use App\Student;
use App\User;
use App\Helper\WebHelper;
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

    // use RegistersUsers;

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

    public function register(Request $request)
    {
        $this->validator($request);

        event(new Registered($user = $this->create($request)));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a ne user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $role_orangtua = Role::where('name', 'Orangtua')->first();

        $user = new User;
        $user->name     = $request->namaLengkap;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->save($role_orangtua);

        $student = new Student;

        $fotoKK = WebHelper::saveImageToPublic($request->file('fotoKK'), '/picture/fotoKK');
        $fotoProfile = WebHelper::saveImageToPublic($request->file('fotoProfile'), '/picture/fotoProfile');

        $student->nama_lengkap      = $request->namaLengkap;
        $student->nama_panggilan    = $request->namaPanggilan;
        $student->kelas             = $request->kelas;
        $student->jenis_kelamin     = $request->jenisKelamin;
        $student->tempat_lahir      = $request->tempatLahir;
        $student->tanggal_lahir     = $request->tanggalLahir;
        $student->usia              = $request->usia;
        $student->agama             = $request->agama;
        $student->alamat_rumah      = $request->alamatRumah;
        $student->telepon_rumah     = $request->teleponRumah;
        $student->foto_kk           = $fotoKK;
        $student->foto_profile      = $fotoProfile;
        $student->anak_ke           = $request->anakKe . '/' . $request->anakDari;
        $student->catatan_medis     = $request->catatanMedis . ' ' . $request->keteranganMedis;
        $student->penyakit_berat    = $request->penyakit;
        $student->keadaan_khusus    = $request->keadaan;
        $student->sifat_baik        = $request->sifatBaik;
        $student->sifat_diperhatikan= $request->sifatPerhatian;
        $user->student()->save($student);
        // $student->save();

        $mother = new Parents;
        if ($request->has('fotoKTPIbu')) {
          $fotoKTPIbu = WebHelper::saveImageToPublic($request->file('fotoKTPIbu'), '/picture/fotoKTP');
        }
        $mother->peran            = 'Ibu';
        $mother->nama_lengkap     = $request->namaLengkapIbu;
        $mother->tempat_lahir     = $request->tempatLahirIbu;
        $mother->tanggal_lahir    = $request->tanggalLahirIbu;
        $mother->agama            = $request->agamaIbu;
        $mother->pendidikan       = $request->pendidikanTerakhirIbu;
        $mother->jurusan          = $request->jurusanIbu;
        $mother->pekerjaan        = $request->pekerjaanIbu;
        $mother->alamat_kantor    = $request->alamatKerjaIbu;
        $mother->telepon_kantor   = $request->teleponKantorIbu;
        $mother->email            = $request->emailIbu;
        $mother->alamat_rumah     = $request->alamatRumahIbu;
        $mother->no_handphone     = $request->nomorHpIbu;
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
        $father->nama_lengkap      = $request->namaLengkapAyah;
        $father->tempat_lahir      = $request->tempatLahirAyah;
        $father->tanggal_lahir     = $request->tanggalLahirAyah;
        $father->agama             = $request->agamaAyah;
        $father->pendidikan        = $request->pendidikanTerakhirAyah;
        $father->jurusan           = $request->jurusanAyah;
        $father->pekerjaan         = $request->pekerjaanAyah;
        $father->alamat_kantor     = $request->alamatKerjaAyah;
        $father->telepon_kantor    = $request->teleponKantorAyah;
        $father->email             = $request->emailAyah;
        $father->alamat_rumah      = $request->alamatRumahAyah;
        $father->no_handphone      = $request->nomorHpAyah;
        if ($request->has('fotoKTPIbu')) {
          $father->foto_ktp          = $fotoKTPAyah;
        }
        $user->student()->save($father);
        // $father->save();

        $wali = new Parents;
        $wali->peran             = 'Wali';
        $wali->nama_lengkap      = $request->namaLengkapWali;
        $wali->tempat_lahir      = $request->tempatLahirWali;
        $wali->tanggal_lahir     = $request->tanggalLahirWali;
        $wali->agama             = $request->agamaWali;
        $wali->pendidikan        = $request->pendidikanTerakhirWali;
        $wali->jurusan           = $request->jurusanWali;
        $wali->pekerjaan         = $request->pekerjaanWali;
        $wali->alamat_kantor     = $request->alamatKerjaWali;
        $wali->telepon_kantor    = $request->teleponKantorWali;
        $wali->email             = $request->emailWali;
        $wali->alamat_rumah      = $request->alamatRumahWali;
        $wali->no_handphone      = $request->nomorHpWali;
        $user->student()->save($wali);
        // $wali->save();

        $nonwali = new Parents;
        $nonwali->peran             = 'Non-wali';
        $nonwali->nama_lengkap      = $request->namaLengkapNonWali;
        $nonwali->telepon_kantor    = $request->teleponRumahNonWali;
        $nonwali->email             = $request->emailNonWali;
        $nonwali->no_handphone      = $request->nomorHpNonWali;
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

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
