<?php
if (! function_exists('getGuestRoles')) {

    function getGuestRoles()
    {
        return [
            'appointments',
            'stonelink/providers',
            'stonelink',
            'application',
            'appointments/appointments',
            'users',
            'users/user',
            'login',
        ];
    }
}
return [
    'guests_roles' => getGuestRoles()
];