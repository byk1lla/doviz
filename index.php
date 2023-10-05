<?php 
require "assets/pages/header.php";
require "assets/config.php";
$page = $_GET['page'] ?? "genelpara";

switch($page){
    case "akbank":
        require "assets/pages/akbank.com.tr.php";
    break;
    case "isbank":
        require "assets/pages/isbank.com.tr.php";
        break;
    case "genelpara":
        require "assets/pages/genelpara.com.php";
        break;
}

require "assets/pages/footer.php";
?>