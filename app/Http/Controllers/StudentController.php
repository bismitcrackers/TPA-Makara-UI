<?php

namespace App\Http\Controllers;

use App\Student;
use App\Helper\WebHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editStudentProfileForm($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            return view('pages.EditProfileSiswa', ['student' => $student]);
        }
    }

    public function editMotherProfileForm($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            $mom = $student->user()->first()->parents()->where('peran', 'Ibu')->first();
            return view('pages.EditProfileIbu', ['student' => $student, 'mom' => $mom]);
        }
    }

    public function editFatherProfileForm($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            $dad = $student->user()->first()->parents()->where('peran', 'Ayah')->first();
            return view('pages.EditProfileAyah', ['student' => $student, 'dad' => $dad]);
        }
    }

    public function editStudentProfile(Request $request, $student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->update(
                [
                    'nama_lengkap'           => $request->namaLengkap,
                    'nama_panggilan'         => $request->namaPanggilan,
                    'jenis_kelamin'          => $request->jenisKelamin,
                    'tempat_lahir'           => $request->tempatLahir,
                    'tanggal_lahir'          => $request->tanggalLahir,
                    'agama'                  => $request->agama,
                    'alamat_rumah'           => $request->alamatRumah,
                    'telepon_rumah'          => $request->teleponRumah,
                    'kelas'                  => $request->kelas,
                ]
            );
            return redirect()->route('successAndRedirect', ['url' => route('profile.edit.details', ['student_id' => $student_id])]);
        }
    }

    public function editMotherProfile(Request $request, $student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            $mom = $student->user()->first()->parents()->where('peran', 'Ibu')->update(
                [
                    'nama_lengkap'           => $request->namaLengkapIbu,
                    'tanggal_lahir'          => $request->tanggalLahirIbu,
                    'pendidikan'             => $request->pendidikanTerakhirIbu,
                    'pekerjaan'              => $request->pekerjaanIbu,
                    'alamat_kantor'          => $request->alamatKerjaIbu,
                    'email'                  => $request->emailIbu,
                    'no_handphone'           => $request->nomorHpIbu,
                ]
            );
            return redirect()->route('successAndRedirect', ['url' => route('profile.edit.details', ['student_id' => $student_id])]);
        }
    }

    public function editFatherProfile(Request $request, $student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            $mom = $student->user()->first()->parents()->where('peran', 'Ayah')->update(
                [
                    'nama_lengkap'           => $request->namaLengkapAyah,
                    'tanggal_lahir'          => $request->tanggalLahirAyah,
                    'pendidikan'             => $request->pendidikanTerakhirAyah,
                    'pekerjaan'              => $request->pekerjaanAyah,
                    'alamat_kantor'          => $request->alamatKerjaAyah,
                    'email'                  => $request->emailAyah,
                    'no_handphone'           => $request->nomorHpAyah,
                ]
            );
            return redirect()->route('successAndRedirect', ['url' => route('profile.edit.details', ['student_id' => $student_id])]);
        }
    }

    public function graduateStudent($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else if ($user->roles()->first()->name == 'Guru') {
            return redirect()->route('guru.home');
        } else if ($user->roles()->first()->name == 'Fasilitator') {
            return redirect()->route('fasilitator.home');
        } else if ($user->roles()->first()->name == 'Co-fasilitator') {
            return redirect()->route('cofasilitator.home');
        } else {
            $student = Student::where('id', $student_id)->update(
                [
                    'lulus'                  => true,
                ]
            );
            return redirect()->route('successAndRedirect', ['url' => route('profile.edit.details', ['student_id' => $student_id])]);
        }
    }

    public function cancelGraduateStudent($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else if ($user->roles()->first()->name == 'Orangtua') {
            return redirect()->route('orangtua.home');
        } else if ($user->roles()->first()->name == 'Guru') {
            return redirect()->route('guru.home');
        } else if ($user->roles()->first()->name == 'Fasilitator') {
            return redirect()->route('fasilitator.home');
        } else if ($user->roles()->first()->name == 'Co-fasilitator') {
            return redirect()->route('cofasilitator.home');
        } else {
            $student = Student::where('id', $student_id)->update(
                [
                    'lulus'                  => false,
                ]
            );
            return redirect()->route('successAndRedirect', ['url' => route('profile.edit.details', ['student_id' => $student_id])]);
        }
    }

    public function editPhotoProfileStudent(Request $request, $student_id)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            if ($request->has('foto_profile')) {

                $image = WebHelper::saveImageToPublic($request->file('foto_profile'), '/picture/fotoProfile');
                $student = Student::where('id', $student_id)->first()->update(
                    [
                        'foto_profile' => $image,
                    ]
                );
            }

            return redirect()->route('successAndRedirect', ['url' => route('profile.edit.details', ['student_id' => $student_id])]);
        }
    }

}
