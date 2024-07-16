<?php 

session_start();

date_default_timezone_set("Europe/Paris");

function connectToDb() {
    $servername = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $databasename = "todoes";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $conn;
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage(); 
    } 
}

function fetchTasks($id) {
    $conn = connectToDb();

    try 
    {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id=:id ORDER BY task_date DESC"); 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // EXECUTING THE QUERY 
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        // FETCHING DATA FROM DATABASE AND RETURNING IT
        return $result = $stmt->fetchAll(); 
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    } 

    $conn=null;
}

function login($data) {
    $conn = connectToDb();
    try 
    {
        $stmt = $conn->prepare("SELECT * FROM users WHERE LOWER(username) = :username OR mail = :username");
        $stmt->bindParam(':username', strtolower($data[username]));
        $stmt->execute();
        // EXECUTING THE QUERY 
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        // FETCHING DATA FROM DATABASE AND RETURNING IT
        $r = $stmt->fetchAll();

        if(empty($r)) {
            header("Location: login.php?error=0");
        } else if (!password_verify($data[password], $r[0][pass])){
            header("Location: login.php?error=1");
        } else {
            session_start();
            $_SESSION[id] = $r[0][id];
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}

function dateTimeToString($date){
    $str = "";                        
                        
    if($date->y > 0){
        if($date->y == 1){
            $str = $date->y . " year";
        } else {
            $str = $date->y . " years";
        }
    } else if($date->m > 0){
        if($date->m == 1){
            $str = $date->m . " month";
        } else {
            $str = $date->m . " months";
        }
    } else if($date->d > 0){
        if($date->d == 1){
            $str = $date->d . " day";
        } else {
            $str = $date->d . " days";
        }
    } else if($date->h > 0){
        if($date->h == 1){
            $str = $date->h . " hour";
        } else {
            $str = $date->h . " hours";
        }
    } else if($date->i > 0){
        if($date->i == 1){
            $str = $date->i . " minute";
        } else {
            $str = $date->i . " minutes";
        }
    } else if($date->s > 0){
        if($date->s == 1){
            $str = $date->s . " second";
        } else {
            $str = $date->s . " seconds";
        }
    }

    return $str;
}

?>