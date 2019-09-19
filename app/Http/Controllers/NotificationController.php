<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
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

    public static function generateNotificationToSpecificUser($sender, $content, $user_id, $redirect_url) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        }
        $notification = new Notification;
        $notification->sender = $sender;
        $notification->content = $content;
        $notification->redirect_url = $redirect_url;
        $notification->is_read = false;
        $notification->save();

        $user = User::where('id', $user_id)->first();
        $notification->users()->attach($user);
        return true;
    }

    public static function generateNotificationToSpecificClass($sender, $content, $class, $redirect_url)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        }
        $notification = new Notification;
        $notification->sender = $sender;
        $notification->content = $content;
        $notification->redirect_url = $redirect_url;
        $notification->is_read = false;
        $notification->save();

        if ($class == 'Day Care') {
            $users = User::whereHas('student', function ($query) {
                $query->where('kelas', 'Day Care');
            })->get();
        } elseif ($class == 'Kelompok Bermain') {
            $users = User::whereHas('student', function ($query) {
                $query->where('kelas', 'Kelompok Bermain');
            })->get();
        }

        $notification->users()->attach($users);
        return true;
    }

    public static function generateNotificationToAllStudent($sender, $content, $redirect_url)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        }
        $notification = new Notification;
        $notification->sender = $sender;
        $notification->content = $content;
        $notification->redirect_url = $redirect_url;
        $notification->is_read = false;
        $notification->save();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Orangtua');
        })->get();
        $notification->users()->attach($users);
        return true;
    }

    public static function generateNotificationFromParent($sender, $content, $redirect_url)
    {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        }
        $notification = new Notification;
        $notification->sender = $sender;
        $notification->content = $content;
        $notification->redirect_url = $redirect_url;
        $notification->is_read = false;
        $notification->save();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'Orangtua');
        })->get();
        $notification->users()->attach($users);
        return true;
    }

    public function redirectToNotificationUrl($id)
    {
        $notification = Notification::where('id', $id)->update(['is_read' => True]);
        $notification = Notification::where('id', $id)->first();
        return redirect($notification->redirect_url);
    }

}
