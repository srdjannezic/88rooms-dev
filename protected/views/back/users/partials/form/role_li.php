<?php

echo "<tr id=\"role-" . $assignment->itemname . "\"><td>" .
 $assignment->itemname .
 "</td><td><input class=\"revoke\" type=\"button\" " .
 "onClick=\"revoke('" .
 Utility::createUrl("users/revokeRole", array("id" => $user->id,
    "role_name" => $assignment->itemname,
    "ajax" => 1)) . "', '" .
 $assignment->itemname . "', '" .
 Utility::createUrl("users/reloadRoles", array("id" => $user->id)) .
 "')\" " .
 "value=\"Revoke\" " .
 "/></td>" .
 "</tr>";