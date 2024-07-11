<?php 

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

function insertNewTask($table, $datas) {

    $servername = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $databasename = "todoes";



    try 
    { 
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password); 

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $conn->prepare("INSERT INTO $table VALUES()"); 
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

?>