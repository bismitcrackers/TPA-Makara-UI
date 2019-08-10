<?php

namespace App\Http\Controllers;

use App\Student;


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

    public function ($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            return view('pages.EditStudentForm', ['student' => $student]);
        }
    }

    public function editMotherProfileForm($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            $mom = $student->user()->first()->parents()->where('peran', 'Ibu')->first();
            return view('pages.EditMotherForm', ['mom' => $mom]);
        }
    }

    public function editFatherProfileForm($student_id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        } else {
            $student = Student::where('id', $student_id)->first();
            $dad = $student->user()->first()->parents()->where('peran', 'Ayah')->first();
            return view('pages.EditFatherForm', ['dad' => $dad]);
        }
    }

    public function editStudentProfile($student_id) {
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
            return redirect()->route('success');
        }
    }

    public function editMotherProfile() {
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
            return redirect()->route('success');
        }
    }

    public function editFatherProfile() {
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
            return redirect()->route('success');
        }
    }

}
