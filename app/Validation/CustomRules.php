<?php

namespace App\Validation;

use App\Models\UserModel;

class CustomRules
{
    public function isFuture(string $str, string &$error = null): bool
    {
        if ($str > date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }

    public function isPast(string $str, string &$error = null): bool
    {
        if ($str < date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }

    public function isPastPresent(string $str, string &$error = null): bool
    {
        if ($str <= date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }

    public function isFuturePresent(string $str, string &$error = null): bool
    {
        if ($str >= date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }

    public function startZero(string $str, string &$error = null): bool
    {
        if ($str[0] != 0) {
            return false;
        } else {
            return true;
        }
    }

    public function validateUser(string $str, string $fields, array $data)
    {
        $userModel = new UserModel();
        $user = $userModel->where('email', $data['email'])->first();

        if (!$user) {
            return false;
        }

        return ($data['password'] == $user['password']);
    }

    public function checkClinic(string $str, string $fields, array $data)
    {
        if ($data['type'] == 'e-consult') {
            return true;
        } else {
            if ($data['clinic'] == 'a1') {
                return false;
            } else {
                return true;
            }
        }
    }

    public function reqDec(string $str)
    {
        if ($str == '')
            return true;

        return is_numeric($str);
    }
}
