<?php

require_once "tools.php";

if(!empty($_POST)){
    $conn = connectToDb();
    try 
    { 
        if(!empty($_POST[newtask_date]) && !empty($_POST[newtask_time]) && $_POST[date_enabled]){
            $datetime = $_POST[newtask_date].$_POST[newtask_time];

            $deadline = DateTime::createFromFormat('Y-m-dH:i' , $datetime);

            $formattedDeadline = $deadline->format('Y-m-d H:i:s');
        }
        $stmt = $conn->prepare("INSERT INTO tasks(task_text, task_deadline, user_id) VALUES(:text, :date, :id)");
        $stmt->bindParam(':date', $formattedDeadline);
        $stmt->bindParam(':text', $_POST[newtask_text]);
        $stmt->bindParam(':id', $_SESSION[id]);
        $stmt->execute();
        // EXECUTING THE QUERY 
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    } 

    $conn=null;
}

header("Location: index.php");

?>