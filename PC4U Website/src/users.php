<?php

class User
{
    public $id; 
    public $firstname;

            
            
    private function ra ($status, $message ='' , $data = null) // private function making it possible to only use the function within this class
        {
            return array ($status, $message, $data);// when email or password doesnt match at login, this function will send an error message
        }

       
    protected function connect()    // protected function making it possible to use this function in extended classes
        {
            $servername = "localhost";
            $username = "root";
            $password = "Daq1Stappels";

        try 
            {   
                $conn = new PDO("mysql:host=$servername;dbname=pc4u", $username, $password); // making a new connection witht the database
               
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
            }

            catch(PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                }   
                return $conn;
        }

       
    public function login($email, $password)  // function for log in, public making it possible to use it outside this class
        {
            $conn = $this->connect(); // setting up connection
            $sql = 'SELECT * FROM gebruikers WHERE email = :email'; // selecting data from database
            $stmt = $conn->prepare($sql); // preparing the information before binding it to database
            $stmt->bindParam(':email', $email); 

        if ($stmt->execute()) // binding info to database
            {
                $data = $stmt->fetch(); //retrieving data
                $conn = NULL; //

            if (password_verify($password, $data['wachtwoord'])) //checking for matching password
                {
                    $_SESSION['id'] = $data["id_gebruiker"];
                    $this->setUserData($data);
                    return $this->ra(true);
                } 

                else 
                    {
                        return $this->ra(false, '*Incorrect email or password');//return this when false
                    } 
            } 

            else 
            {
                $this->$conn = NULL;
                return $this->ra(false, 'SQL failed');
            }
        }

         
    public function register($firstname, $middlename, $lastname, $email, $password)//function for user registration   
        {   
            $conn = $this->connect();// connecting to database
            require 'validation.php'; // including validation form

            $firstnameSession = allValidator($firstname, 'firstname', 'yes');  //validating the register information
            $middlenameSession = allValidator($middlename, 'middlename', 'no');
            $lastnameSession = allValidator($lastname, 'lastname', 'yes');
            $passwordSession = allValidator($password, 'password', 'yes');
            $emailSession = allValidator($email, 'email', 'yes');

        if ($firstnameSession === false || $middlenameSession === false || $lastnameSession === false || $emailSession === false || $passwordSession === false) 
            {
                header('location: ../register.php'); //when info not falid, sending bach to register page
            }
            else 
                {    
                try 
                    {
                        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]); // encrypting the password into the database
                        $stmt = $conn->prepare("INSERT INTO gebruikers (voornaam, tussenvoegsels, achternaam, email, wachtwoord) 
                                                VALUES (:firstname, :middlename, :lastname, :email, :wachtwoord)");
                        $stmt->bindParam(':firstname', $firstname);
                        $stmt->bindParam(':middlename', $middlename);
                        $stmt->bindParam(':lastname', $lastname);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':wachtwoord', $password);

                    if ($stmt->execute()) // extracting all the info to the database
                        {
                        $conn = NULL;
                        header('Location: ../index.php');
                        }
                    }
        
                    catch(PDOExpection $e) 
                        {
                        if ($e->errorInfo[1] == 1062) 
                            {
                                $_SESSION['error_Email'] = "*this email is already being used";
                                header("location: ../register.php"); // sending back to register page with error message
                            }
                        }
                }
        }
    

    public function update($firstname, $middlename, $lastname, $email, $password) // function for updating user information
        {
            $conn = $this->connect(); // Connecting to database
            require 'validation.php'; // inlcuding validation form

            $firstnameSession = allValidator($firstname, 'firstname', 'yes'); // validating first name
            $middlenameSession = allValidator($middlename, 'middlename', 'no');// validating middle name
            $lastnameSession = allValidator($lastname, 'lastname', 'yes');// validating last name
            $emailSession = allValidator($email, 'email', 'yes');// validating email
            $passwordSession = allValidator($password, 'password', 'yes');// validating password

        if ($firstnameSession === false || $middlenameSession === false || $lastnameSession === false || $emailSession === false || $passwordSession === false) 
            { 
                header('location: ../settings.php'); // when one of the inputs is false, send back without changing
            }
            else 
                {
                try 
                    {
                        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]); // encrypting new password
                        //updating database with the new information
                        $stmt = $conn->prepare("UPDATE gebruikers SET voornaam = :firstname, tussenvoegsels = :middlename, achternaam = :lastname, email = :email, wachtwoord = :wachtwoord WHERE id_gebruiker = :id");
                        $stmt->bindParam(':firstname', $firstname);
                        $stmt->bindParam(':middlename', $middlename);
                        $stmt->bindParam(':lastname', $lastname);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':wachtwoord', $password);
                        $stmt->bindParam(':id', $_SESSION['id']); // bincing to the current session id

                    if ($stmt->execute()) 
                    {
                        $conn = NULL;
                        header('Location: ../settings.php');
                    }
                    }
        
                    catch(PDOExpection $e) 
                        {
                        if ($e->errorInfo[1] == 1062) 
                            {
                                $_SESSION['error_Email'] = "*this email is already being used";
                                header("location: ../settings.php");
                            }
                        }
                }
        }


    public function userinfo() // function to be able to see the current database information 
        {
            $conn = $this->connect();
            $sql='SELECT * FROM gebruikers WHERE id_gebruiker = :id';
            $stmt = $conn->prepare ($sql);
            $stmt->bindParam(":id", $_SESSION['id']);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $data;
        
        }


    public function deleteUser() //function for deleting user out of database
        {
            $conn = $this->connect();
            $sql = "DELETE FROM gebruikers WHERE id_gebruiker=:id";
            $stmt = $conn->prepare ($sql);
            $stmt->bindParam(":id", $_SESSION['id']);
        
        if ($stmt->execute())   
            {
                header('location: ../index.php');
            }
            else 
                { 
                    $conn=null;
                    echo'sql failed';
                }
        }


    private function setUserData($db_row)
        {
            $this->id = $db_row['id_gebruiker'];
            $this->firstname = $db_row['voornaam'];
        }
}
?>