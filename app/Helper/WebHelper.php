<?php

namespace App\Helper;

use Carbon\Carbon;

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

    public static function getMonthListFromDate($start)
    {
        $start = $start->startOfMonth();
        $end   = Carbon::today()->startOfMonth();
        $i = 0;
        $months = [];
        do
        {
            $i = $i + 1;
            $months[$i]['month'] = $start->format('m');
            $months[$i]['month_name'] = $start->format('F');
            $months[$i]['year'] = $start->format('Y');
        } while ($start->addMonth() <= $end);
        return $months;
    }

}
