<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showAdminRegisterForm() {
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Administrator' || $role == 'Koordinator' || $role == 'Wakil Koordinator' || $role == 'Staf Administrasi') {
            return view('pages.AdminRegistrationForm', ['msg' => '']);
        } else {
            return redirect()->route('login');
        }
    }

    public function submitAdminRegisterForm(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        $role = auth()->user()->roles()->first()->name;
        if ($role == 'Administrator' || $role == 'Koordinator' || $role == 'Wakil Koordinator' || $role == 'Staf Administrasi') {
            if ($request->password == $request->password_confirmation) {
                $role = Role::where('name', $request->role)->first();
                $user = new User;
                $user->name     = $request->name;
                $user->email    = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                $user->roles()->save($role);

                return redirect()->route('success');
            } else {
                return view('pages.AdminRegistrationForm', ['msg' => 'Password Tidak Sesuai']);
            }
        } else {
            return redirect()->route('login');
        }

    }

    public function showPasswordChangeForm() {
        if (auth()->user() == null) {return redirect()->route('login');}
        return view('pages.PasswordChangeForm', ['msg' => '']);
    }

    public function submitPasswordChangeForm(Request $request) {
        if (auth()->user() == null) {return redirect()->route('login');}
        if (Hash::check($request->passwordLama, auth()->user()->password) && $request->password == $request->password_confirmation) {

            $user = User::where('id', auth()->user()->id)->update(
                [
                    'password'      => bcrypt($request->password)
                ]
            );
            return redirect()->route('success');
        } else {
            return view('pages.PasswordChangeForm', ['msg' => 'Password Tidak Sesuai']);
        }
    }
}
