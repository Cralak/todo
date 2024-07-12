<?php

require_once "tools.php";

if(!empty($_POST)){
    insertNewTask($_POST);
}

header("Location: index.php");

?>