<?php

$database = new mysqli("rei.cs.ndsu.nodak.edu", "noah_magcalas_371s23", "FKtj8wsxMN0!", "noah_magcalas_db371s23");

if ($database->connect_errno) 
{
   die("Failed to connect to MySQL: ($database ->connect_errno) $database ->connect_error");
}

?>