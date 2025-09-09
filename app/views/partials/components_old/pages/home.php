
<?php
switch (strtolower(USER_ROLE)) {
    case "admin":
        include "home/admin.php";
        break;
    case "super admin":
        include "home/superadmin.php";
        break;
    case "staff":
        include "home/staff.php";
        break;
    default :
        include "home/student.php";
}