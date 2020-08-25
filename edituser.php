<?php
session_start();


if(!isset($_SESSION['email']) && !isset($_SESSION['id']) && !isset($_SESSION['role']) && !isset($_SESSION['name'])){
    
    header('Location: index.php');
    
}

$id = $_GET['id'];

$role = $_SESSION['role'];

if($role === '3'){
    
    header('Location: index.php');
}

require_once('controllers/db.class.php');

require_once('models/stats.class.php');

require_once('models/forms.class.php');

require_once('models/patients.class.php');

include('views/headerhtml.inc.php');

include('views/bodystart.inc.php');

include('views/header.inc.php');

include('views/edituser.inc.php');

include('views/footer.inc.php');

include('views/bodyend.inc.php');

?>