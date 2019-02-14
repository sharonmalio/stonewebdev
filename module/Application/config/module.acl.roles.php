<?php 

include_once __DIR__ . '/../../../config/autoload/roles.acl.php';
return [
    'Guest'=> getGuestRoles(),
    'Patient'=>getPatientRoles(),
    'Practitioner'=>getPractitionerRoles(),
    'Admin'=>getAdminRoles(),
    'Developer'=>getDeveloperRoles()
];