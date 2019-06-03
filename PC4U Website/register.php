<!DOCTYPE html>
<?php   
    session_start(); 
    ?>
<html>
    <head>
            <title>registration</title>
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
                <form method='post' action='forms/registerForm.php'>
                    <div class="registerbox">
                        <h1>Register</h1>
                        <P> Please fill in this form to register an account.</P>
                    <div class="textbox">
                        <label for="firstname"><b>First name</b></label>
                        <label class="custom-error">
                            <?php
                            if (isset($_SESSION['error_firstname'])) 
                                {
                                    echo $_SESSION['error_firstname'];
                                }
                            ?>
                        </label>
                        <p><input type='text' placeholder="First name" name='firstname'></p>
                    </div>
                    <div class="textbox">
                        <label for="middlename"><b>Middle name</b></label>
                        <label class="custom-error">
                            <?php
                                if (isset($_SESSION['error_middlename'])) 
                                {
                                    echo $_SESSION['error_middlename'];
                                }
                            ?>
                        </label>
                            <p><input type='text' placeholder="Midde name" name='middlename'></p>
                    </div>
                    <div class="textbox">
                        <label for="lastname"><b>Last name</b></label>
                        <label class="custom-error">
                            <?php
                                if (isset($_SESSION['error_lastname'])) 
                                {
                                    echo $_SESSION['error_lastname'];
                                }
                            ?>
                        </label>
                        <p><input type='text' placeholder="Last name" name='lastname'></p>
                    </div>
                    <div class="textbox">
                        <label for="email"><b>email</b></label>
                        <label class="custom-error">
                            <?php
                                if (isset($_SESSION['error_email'])) 
                                {
                                    echo $_SESSION['error_email'];
                                }
                            ?>
                        </label>
                        <p><input type='email' placeholder="Example@hotmail.com" name='email'></p>
                    </div>
                    <div class="textbox">
                        <label for="password"><b>Password</b></label>
                        <p><input type='password' placeholder="password" name='password'></p>
                    </div>
                            <?php
                            if (isset($_SESSION['error_firstname']))  {
                                unset($_SESSION['error_firstname']);
                            }
                            if (isset($_SESSION['error_middlename'])) {
                                unset($_SESSION['error_middlename']);
                            }
                            if (isset($_SESSION['error_lastname'])) {
                                unset($_SESSION['error_lastname']);
                            }
                            if (isset($_SESSION['error_email'])) {
                                unset($_SESSION['error_email']);
                            }
                            if (isset($_SESSION['error_password'])) {
                                unset($_SESSION['error_password']);
                            }
                            ?>
                        <p>By creating an account you agree to our <a href="terms.php">Terms & Policies</a></p>
                        <input type='submit' name="registerbutton" value='register' class="registerbtn">
                        <p>Already have an account?<a href="index.php">Sign in</a></p>
                    </div>
                </form>
        </body>
<html>