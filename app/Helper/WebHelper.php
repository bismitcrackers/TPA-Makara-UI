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
        $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path($dir);
        $file->move($destinationPath, $imageName);
        return $dir . '/' . $imageName;
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

    public static function getValidatedDate($dateStr)
    {
        return Carbon::parse($dateStr);
    }

    // public static function replaceImageFromPublic($newFileName, $oldFileName, $dir)
    //     if(File::exists($filename)) {
    //
    //         $newFileName  = public_path('uploads/institutions/').$institution->avatar;
    //
    //         $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
    //         Image::make($file)->resize(250, 205)->save( public_path('uploads/institutions/' . $filename_new ) );
    //
    //       //update filename to database
    //       $institution->avatar = $filename_new;
    //       $institution->save();
    //       //Found existing file then delete
    //       File::delete($filename);  // or unlink($filename);
    //     }
    // }
}
