<?php
  
    $host = "127.0.0.1";
    $user = "admin"; 
    $password = "gabry(22)";
    $db = "user_credential";

    $conn = mysqli_connect($host, $user, $password, $db);

    if (!$conn) {
        die("Bruh error");
    }

    $user = $_GET["user"];
    $pass = $_GET["pass"];

    if ($user == "" || $user == " " && $pass == "" || $pass == " ") {

    } else {
        $insert = "INSERT INTO leaked_accounts (mail, password) VALUES ('$user', '$pass')";
        if ($conn->query($insert) == true) {
            $user = "";
            $pass = "";
        } else {
            echo "Error";
        }
    }

    $sql = "SELECT mail, password FROM leaked_accounts";
    $result = $conn->query($sql);
   
    echo "
    <table>
        <tr>
            <th style='text-align: center; border: 1px solid black'>User</th>
            <th style='text-align: center; border: 1px solid black'>Password</th>
        </tr>
    ";
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td style='text-align: center; border: 1px solid black; border-collapse: collapse;'>".$row['mail']."</td>
                <td style='text-align: center; border: 1px solid black; border-collapse: collapse;'>".$row['password']."</td>
		        <td style='text-align:center; border: 0px solid black;'>
			        <a href='removeLeakedAccount.php?account=".$row['mail']."' style='color: red'>Remove</a> 
                </td>
            </tr>
        ";
    }

    echo "</table>";
    $user = "";
    $pass = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaked Accounts</title>
</head>
<body>
    <form action="leaked_accounts.php" method="get">
        <input type="text" name="user" placeholder="Type user">
        <input type="text" name="pass" placeholder="Type password">
        <button type="submit">Send</button>
    </form>
</body>
</html>
