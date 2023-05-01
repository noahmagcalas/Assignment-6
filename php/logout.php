<?php

$sessID = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab';
session_id($sessID);
session_start();

session_destroy();

header("Location: home.php");
exit();

?>