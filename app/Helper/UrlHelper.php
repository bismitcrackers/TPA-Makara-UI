<?php

namespace App\Helper;

class UrlHelper
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

}

 ?>
