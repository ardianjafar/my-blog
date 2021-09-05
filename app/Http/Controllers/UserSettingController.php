<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    public function setting()
    {
        // return view(''admin.se)
    }

    public function profile()
    {
        return view('admin.setting.user-profile');
    }
}
