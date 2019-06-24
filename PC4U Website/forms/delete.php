<?php 
session_start(); 

require('../src/users.php');
$user = new User(); //calling the class
$data = $user->deleteUser(); // delete user in the database
?>