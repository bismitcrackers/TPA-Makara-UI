<?php

namespace App\Helper;

class WebHelper
{

    public static function getUrlForRole($role)
    {
        if($role == 'Administrator' ||
            $role == 'Koordinator' ||
            $role == 'Wakil Koordinator' ||
            $role == 'Staf Administrasi') {
            return 'admin';
        } else {
            return strtolower($role);
        }
    }

    public static function saveImageToPublic($file, $dir)
    {
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path($dir);
        $file->move($destinationPath, $imageName);
        return $destinationPath . $imageName;
    }

}
