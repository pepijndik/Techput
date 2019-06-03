<?php   
    session_start();
    require('src/users.php');
    $user = new User();
    $data = $user->userinfo();
?>

<html>
    <head>
            <title>Settings</title>
            <link rel="stylesheet" href="css/styleSettings.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
        <body>
            <div id="navigation">
                <ul>
                        <li><a href="mypage.php">My page</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li class="logoutnav"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
                <div class="wrapper">
                    <div class="userinfo">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">User Info</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>First name: </td>
                                        <td><?php echo $data['voornaam'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Middle name: </td>
                                        <td><?php echo $data['tussenvoegsels'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last name: </td>
                                        <td><?php echo $data['achternaam'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td><?php echo $data['email'] ?></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    <div class="changebox">
                            <p><h2> Completely fill in this form if you want to change your user information.</h2></p>
                        <form action="forms/updateForm.php" method="post">
                            <div class="textbox">
                                <label for ="firstname"><b>First name</b></label>
                                <label class="custom-error">
                                    <?php
                                        if (isset($_SESSION['error_firstname'])) 
                                        {
                                            echo $_SESSION['error_firstname'];
                                        }
                                    ?>
                                </label>
                                <p><input type='text'placeholder="First name" name='firstname'></p>
                            </div>
                            <div class="textbox">
                                <label for ="middlename"><b>Middle name</b></label>
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
                                <label for ="lastname"><b>Last name</b></label>
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
                                <label for ="email"><b>email</b></label>
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
                                <label for ="password"><b>Password</b></label>
                                <p><input type='password'placeholder="password" name='password'></p>
                            </div>
                                    <?php
                                    if (isset($_SESSION['error_firstname'])) {
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
                                <input type="submit" name="updatebutton" name="wijzigUser" placeholder="Update Data">
                        </form>
                    </div>
                </div>
                    <div class="deletebox">
                        <h2> Delete account </h2>
                        <!-- Trigger/Open The Modal -->
                        <button class="deletebutton" id="myBtn">Delete account</button>
                        <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p><h2> Are you sure you want to delete your account?</h2></p>
                            <form action="forms/delete.php">
                                <input type='submit' value='delete' class="deletebtn">
                            </form>
                        <a href="settings.php" class="cancelbtn">cancel</a>
                    </div>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');
                    
                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");
                    
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    
                    // When the user clicks the button, open the modal 
                    btn.onclick = function() 
                        {
                            modal.style.display = "block";
                        }
                    
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() 
                        {
                            modal.style.display = "none";
                        }
                    
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) 
                        {
                            if (event.target == modal) 
                                {
                                    modal.style.display = "none";
                                }
                        }
                </script>
            </div>
        
    </body>
</html>