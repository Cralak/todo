<?php

require_once "tools.php";

if(!empty($_GET)){
    deleteTask($_GET);
}

header("Location: index.php");

?>