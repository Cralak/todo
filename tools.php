<?php 

date_default_timezone_set("Europe/Paris");

function deleteTask($data) {

    $servername = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $databasename = "todoes";

    try 
    { 
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password); 

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id=:id");
        $stmt->bindParam(':id', $data[id]);
        $stmt->execute();
        // EXECUTING THE QUERY 
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    } 

    $conn=null;
}


function fetchData($query) {

    $servername = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $databasename = "todoes";

    try 
    { 
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password); 

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $conn->prepare("SELECT * FROM $query"); 
        $stmt->execute();
        // EXECUTING THE QUERY 
        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        // FETCHING DATA FROM DATABASE AND RETURNING IT
        return $result = $stmt->fetchAll(); 
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    } 

    $conn=null;
}


function insertNewTask($data) {

    $servername = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $databasename = "todoes";

    try 
    { 
        if(!empty($data[newtask_date]) && !empty($data[newtask_time])){
            $datetime = $data[newtask_date].$data[newtask_time];

            $deadline = DateTime::createFromFormat('Y-m-dH:i' , $datetime);

            $formattedDeadline = $deadline->format('Y-m-d H:i:s');
        }


        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password); 

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $conn->prepare("INSERT INTO tasks(task_text, task_deadline) VALUES(:text, :date)");
        $stmt->bindParam(':date', $formattedDeadline);
        $stmt->bindParam(':text', $data[newtask_text]);
        $stmt->execute();
        // EXECUTING THE QUERY 
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    } 

    $conn=null;
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