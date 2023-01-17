<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Support\Facades\Session;

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
    public static function displayAlert()
    {
        if (Session::has('message')) {
            list($type, $message) = explode('|', Session::get('message'));

            return sprintf('<div class="top_message"><div class="alert alert-%s">%s</div></div>', $type, $message);
        }

        return '';
    }
}
