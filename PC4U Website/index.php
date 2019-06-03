<?php   
    session_start(); 
?>

<html>
    <head>
            <title>index</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/stylesheetLR.css">
    </head>
        <body>
            <div id="navigation">
                <ul>
                        <li><a href="index.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                </ul>
            </div>
            <img src="images/computers4u.png" alt="logo" style="width:450px;height:125px;">
                <form action='forms/loginForm.php' method="POST">
                    <div class=loginbox>
                        <h1><legend>Login</legend></h1>
                        <div class="textbox">
                            <label class="custom-error">
                                <?php
                                if (isset($_SESSION['ERROR_MESSAGE']))
                                    {

                                        echo $_SESSION['ERROR_MESSAGE'];
                                    }
                                ?>
                            </label>
                            <label for="email"><b>email</b></label>
                                <p><input type="text" placeholder="Enter Email" name="email"required></p>
                        </div>
                        <div class="textbox">
                            <label for ="password"><b>Password:</b></label>
                                <p><input type="password" placeholder="Enter Password"name="password"required></p>
                        </div>
                                    <input type='submit' value='login' class="loginbtn" name="verstuur">
                    </div>
                                <?php
                                if (isset($_SESSION['ERROR_MESSAGE'])) 
                                    {
                                        unset($_SESSION['ERROR_MESSAGE']);
                                    }
                                ?>
                </form>
        </body>
</html>