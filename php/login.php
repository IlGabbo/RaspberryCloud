<?php
session_start();
include "config.php";
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = $connection->real_escape_string($_POST["username"]);
        $password = $connection->real_escape_string($_POST["password"]);
               

        if (empty($username)) {
            header("location: ../index.php?error=Utente vuoto");
            exit();
        } else if (empty($password)) {
            header("location: ../index.php?error=Password vuota");
            exit();
        } else {
            $_SESSION["loggato"] = true;
            $i = 0;
            $sql = "SELECT * FROM utenti";
            $result = mysqli_query($connection, $sql);
            $rowcount = mysqli_num_rows($result);   
            

            while($row = $result->fetch_assoc()) {
                $userRow[$i] = $row["username"];
                $passRow[$i] = $row["password"];
                $complete[$i] = $row["username"]." ".$row["password"];
                $i++;
            }

            
                for ($i = 0; $i < $rowcount; $i++) {
                    if ($userRow[$i] == $username && password_verify($password, $passRow[$i])) {
                        header("location: ../$username/dashboard/cloud.php"); #$username
                        $sas = true;
                        break;
                    } else {
                        $sas = false;
                    }
                }

                if ($sas == true) {
                   #Nothing
                } else if ($sas == false) {
                    header("location: ../index.php?error=Username o password non corretti");
                }
                           

            /*if (mysqli_num_rows($result) > 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row["username"] === $username && password_verify($password, $row["password"])) {
                    header("location: ../dashboard/cloud.php");
                    
                } else {
                    header("location: ../index.php?error=Incorrect Username or Password");
                    exit();
                }


            } else {
                header("location: ../index.php?error=Incorrect Username or Password");
                exit();
            } */
        }



    } else {
        header("location: ../index.php");
        exit();
    }
?>