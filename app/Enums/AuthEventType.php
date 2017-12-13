<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AuthEventType extends Enum
{
    const Unknown = 0;
    const Registered = 1;
    const Attempting = 2;
    const Authenticated = 3;
    const Login = 4;
    const FailedLogin = 5;
    const Logout = 6;
    const Lockout = 7;
    const PasswordReset = 8;
}
