<?php  
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require('../src/post.php');

    $newPost = new Post(); //new post

    $datum = date("Y-m-d"); //setting date
    $beschrijving = test_input($_POST['beschrijving']); // character validation

    $uploadStory = $newPost->userPost($datum, $beschrijving); //connection to class userPost

    function test_input($data) // when writing code in an input, this funcion will filter it as text and not as code
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>

