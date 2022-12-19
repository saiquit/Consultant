<?php

namespace App\Helper;

use App\Models\User;

class Helper
{
    public static function instance()
    {
        return new Helper();
    }
    public function get_admins()
    {
        return  User::whereType('admin')->get();
    }
}
