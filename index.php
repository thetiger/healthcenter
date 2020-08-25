<?php
session_start();


if(isset($_SESSION['email']) && isset($_SESSION['id']) && isset($_SESSION['role']) && isset($_SESSION['name'])){
    
    header('Location: system.php');
    
}

require_once('controllers/db.class.php');

require_once('controllers/accounts.class.php');

include('views/headerhtml.inc.php');

include('views/bodystart.inc.php');

include('views/header.inc.php');

include('views/login.inc.php');

include('views/footer.inc.php');

include('views/bodyend.inc.php');

?>