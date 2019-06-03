<?php

    function allValidator($input, $type, $required)  // validation form for register and update
        {
            $input = test_input($input);
            $session_name = 'error_' . $type;

        if ($required == 'yes')
            {
                if (empty($input))
                    {
                        $_SESSION[$session_name] ='*' . $type . ' is required.'; // error message when field is empty
                        return false;
                    }
            }

        if (!empty($input)) 
            {
                if ($type === 'firstname' || $type === 'middlename' || $type === 'lastname')// validation for first name middle name and last name
                    {
                        $regex = "/^[a-zA-Z .]*$/"; // only lower case, upper case letters, spaces and points
                        $message = '* Only letters and spaces allowed.';
                    } 
                    elseif ($type === 'email') 
                        {
                            $regex = "/^[a-zA-Z0-9 ]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
                            $message = "*Invalid email";
                        } 
                    elseif ($type === 'password') 
                        {
                            $regex = "/^[a-zA-Z0-9]*$/";
                            $message = '* Only letters, numbers and spaces allowed.';
                        }
                if (!preg_match($regex, $input)) 
                    {
                        $_SESSION[$session_name] = $message;
                        return false;
                    }
            }
                        return true;
        }
?>
