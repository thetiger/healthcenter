<?php
session_start();


if(!isset($_SESSION['email']) && !isset($_SESSION['id']) && !isset($_SESSION['role']) && !isset($_SESSION['name'])){
    
    header('Location: index.php');
    
}

$role = $_SESSION['role'];

if($role === '3'){
    
    header('Location: index.php');
}

require_once('controllers/db.class.php');

require_once('models/stats.class.php');

require_once('models/forms.class.php');

require_once('models/patients.class.php');

require_once('controllers/accounts.class.php');

use Stats\stats;
use Forms\generator;
use Accounts\accounts;

include('views/headerhtml.inc.php');

include('views/bodystart.inc.php');

if(isset($_POST['adduser'])){
    
    $errs = 0;
    
    $name = @$_POST['username'];
    $dob = @$_POST['userdob'];
    $address = @$_POST['useraddress'];
    $number = @$_POST['usernumber'];
    $gender = @$_POST['usergender'];
    $role = @$_POST['userrole'];
    $email = @$_POST['useremail'];
    $password = @$_POST['userpassword'];
    
    if(generator::vetinput($name) === true){
        $errName = '<div class="alert alert-warning">
  <strong>Warning!</strong> Empty Field
</div>';
        $errs++;
    }
    if(generator::checktext($name) == false){
        $errName = '<div class="alert alert-warning">
  <strong>Warning!</strong> Too many characters
</div>';
        $errs++;
    }
    
//    if(generator::vetinput($dob) === true){
//        $errDob = '<div class="alert alert-warning">
//  <strong>Warning!</strong> Empty Field
//</div>';
//        $errs++;
//    }
//    if(generator::checkdate($dob) == false){
//        $errDob = '<div class="alert alert-warning">
//  <strong>Warning!</strong> Wrong Dob
//</div>';
//        $errs++;
//    }
    
     if(generator::vetinput($number) === true){
        $errNumber = '<div class="alert alert-warning">
  <strong>Warning!</strong> Empty Field
</div>';
        $errs++;
    }
    if(generator::checktext($number) == false){
        $errNumber = '<div class="alert alert-warning">
  <strong>Warning!</strong> Too many characters
</div>';
        $errs++;
    }
    
    if(generator::checkgender($gender) == false){
        $errGender = '<div class="alert alert-warning">
  <strong>Warning!</strong> Are you an Alien?
</div>';
        $errs++;
    }
    
    if(generator::checkrole($role) == false){
        $errRole = '<div class="alert alert-warning">
  <strong>Warning!</strong> What is your role?
</div>';
        $errs++;
    }
    
    if($errs === 0){
        
  accounts::createuser($name,$dob,$address,$number,$gender,$role,$email,$password);
        
    }

    
}

include('views/header.inc.php');

include('views/adduser.inc.php');

include('views/footer.inc.php');

include('views/bodyend.inc.php');

?>