<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require('../src/users.php');

    $user = new User();

    function test_input($data) // when writing code in an input, this funcion will filter it as text and not as code
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['updatebutton'])) 
        {
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $update = $user->update($firstname, $middlename, $lastname, $email, $password);
        }

?>