<?php

require_once "tools.php";

if(!empty($_POST)){
    insertNewTask("tasks", $_POST);
}

header("Location: index.php");

?>