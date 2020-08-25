<?php
use Accounts\accounts;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">

<div class="col-lg-12">
    <h2 class="centertext">Health Centre System</h2>
    <?php
        if(isset($_POST['submitlogin'])){
    
   $result = accounts::login($_POST['email'],$_POST['password']);
            
    if(is_array($result)){
        
        foreach($result AS $lol){
        
        $_SESSION['email'] = $lol['email'];
        $_SESSION['id'] = $lol['id'];
        $_SESSION['name'] = $lol['name'];
        $_SESSION['role'] = $lol['role'];
            
            header('Location: index.php');
            
            }
        
        
    }
            else
            {
                echo accounts::login($_POST['email'],$_POST['password']);
            }
    
}
    ?>
</div>
    
    <div class="col-lg-12">
        
    <div class="col-md-4">
<a style="margin:5px;" class="btn btn-primary" href="attendance.php" title="Confirm Attendance" role="button">Confirm Attendance</a>
    </div>
    
    <div class="col-md-4">
        <form action="index.php" method="post">
        
            <div class="form-group">
                
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            
            </div>
            
            <div class="form-group">
                
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            
            </div>
            
            <div class="form-group">
                
                <input type="submit" name="submitlogin" class="form-control" value="Login">
            
            </div>
        
        
        </form>
    </div>
    

    <div class="col-md-4">
            
            <div class="col-lg-12"><span class="glyphicon glyphicon-plus glyphiconbigger"></span>&nbsp;View Patient Records</div>
            <div class="col-lg-12"><span class="glyphicon glyphicon-signal glyphiconbigger"></span>&nbsp;Create Appointments</div>
            <div class="col-lg-12"><span class="glyphicon glyphicon-user glyphiconbigger"></span>&nbsp;Controlled System Access</div>
            <div class="col-lg-12"><span class="glyphicon glyphicon-user glyphiconbigger"></span>&nbsp;Update Patient Records</div>
        
    </div>
    </div>

    </div>

</div>

</div>
    
    
</div>