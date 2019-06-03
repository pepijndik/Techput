<?php  
session_start();
require('../src/users.php');
$user = new User();
$email = $_POST['email'];
$password = $_POST['password'];
$login = $user->login($email, $password);

if ($login[0] === true) //if login is succes go to myPage.php
    {
        $_SESSION = NULL;
        $_SESSION['id'] = $user->id;
        $_SESSION['firstname'] = $user->firstname;
        header ('Location: ../myPage.php');
    } 
    else 
        {       // when failed sending back to index.php
            $_SESSION ['ERROR_MESSAGE'] = $login[1];
            header ('Location: ../index.php');
        }
?>