<?php

require_once "tools.php";

if(!empty($_POST)) {
    $conn = connectToDb();
    try{
        if((preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $_POST[mail])) && (preg_match("/^[a-zA-Z0-9-_]{3,20}$/", $_POST[username])) && (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d\s]).{8,}$/", $_POST[password]))){
            $mail = strtolower($_POST[mail]);
            $username = $_POST[username];
            $pass = password_hash(($_POST[password]), PASSWORD_DEFAULT);
            
            $stmt = $conn->prepare("SELECT mail, username FROM users WHERE mail = :mail OR username = :username");
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':username', $username); 
            $stmt->execute();
            // EXECUTING THE QUERY 
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            // FETCHING DATA FROM DATABASE AND RETURNING IT
            $result = $stmt->fetchAll();

            $mail_used = false;
            $username_used = false;
            

            foreach($result as $r) {
                if($r[mail] == $mail) {
                    $mail_used = true;
                } else if (strtolower($r[username]) == strtolower($username)) {
                    $username_used = true;
                }
            }

            if($mail_used) {
                header("Location: register.php?error=0");
            } else if ($username_used) {
                header("Location: register.php?error=1");
            } else {
                $stmt = $conn->prepare("INSERT INTO users(mail, username, pass) VALUES(:mail, :username, :pass)");
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':pass', $pass);
                $stmt->execute();
                header("Location: login.php");
            }
        } else {
            var_dump("test");
            header("Location: register.php");
        }
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    } 
    
} else {
    header("Location: register.php");
}

?>