<?php

require_once "tools.php";

if(!empty($_GET)){
    $conn = connectToDb();
    try
    { 
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id=:taskid AND user_id=:userid");
        $stmt->bindParam(':taskid', $_GET[id]);
        $stmt->bindParam(':userid', $_SESSION[id]);
        $stmt->execute();
        // EXECUTING THE QUERY 
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    } 

    $conn=null;
}

header("Location: index.php");

?>