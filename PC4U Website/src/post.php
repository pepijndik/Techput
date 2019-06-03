<?php
require 'users.php';

class Post extends User
{ 


    public function postInfo() // function to be able to see the current database information 
        {
            $conn = $this->connect();
            $sql='SELECT * FROM afspraak WHERE id_gebruiker = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $_SESSION["id"]);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }


    public function userPost($datum, $beschrijving) // putting   Appointment into database 
        {
            $conn = $this->connect(); //making connection
            $sql='INSERT INTO afspraak (id_gebruiker, beschrijving, datum) VALUES (:id, :beschrijving, :datum)'; // put info in database Post
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $_SESSION["id"]);
            $stmt->bindParam(':datum',$datum);
            $stmt->bindParam(':beschrijving',$beschrijving);
        
            if ($stmt->execute())
            {
                $conn = NULL;
                header('location: ../mypage.php');
            }
        }
}
?>