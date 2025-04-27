<?php

namespace App\Http\Domain;

use App\Http\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserProfileValidator
{

    public static function getIdUser()
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return $user->id;
    }

    public static function getIdProfileUser()
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return $user->profile->id;
    }

    public static function getNameProfileUser()
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return $user->profile->domain;
    }

    public static function validate($requiredProfile)
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        return strtolower($user->profile->domain) === strtolower($requiredProfile);
    }

    public static function isAdminAdmin()
    {
        return self::validate(Constants::PROFILE_ADMIN_ADMIN);
    }

    public static function isAdminCompany()
    {
        return self::validate(Constants::PROFILE_ADMIN_COMPANY);
    }

    public static function isUser()
    {
        return self::validate(Constants::PRODILE_USER);
    }
}
