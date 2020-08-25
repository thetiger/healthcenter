<?php

use Stats\stats;
use Forms\generator;
?>
<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <div class="col-lg-12">
        
        <h3>User Registration</h3>
        <p>Here you can add new patients, receptionists and doctors to the system.</p>
    
    </div>
    
    <div class="col-lg-12">
    
    <?php echo generator::formopen('open','adduser.php','post'); ?>
    <div class="col-md-6">
    
    <div class="form-group">
   
        <label>Name:</label>
        <?php
        if(isset($errName)){
            var_dump($username);
        echo generator::form('text','username',$username,'phone'); 
        
        }
        else
        {
            echo generator::form('text','username','','phone');
        }
        
        ?>
        <?php if(isset($errName)){echo $errName; }?>
        
    </div>
    
     <div class="form-group">
   
        <label>Dob:</label>
    
        <?php echo generator::form('date','userdob','','phone'); ?>
        <?php if(isset($errDob)){echo $errDob; }?>
    </div>
        
     <div class="form-group">
   
        <label>Address:</label>
    
        <?php echo generator::form('textarea','useraddress','',''); ?>
        <?php if(isset($errAddress)){echo $errAddress; }?>
    </div>
        
        <div class="form-group">
   
        <label>Email:</label>
    
        <?php echo generator::form('email','useremail','Enter an Email',''); ?>
        <?php if(isset($errEmail)){echo $errEmail; }?>
    </div>
    
    
    </div>
        
    <div class="col-md-6">
       
    <div class="form-group">
   
        <label>Phone Number:</label>
    
        <?php echo generator::form('text','usernumber','',''); ?>
        <?php if(isset($errNumber)){echo $errNumber; }?>
    </div>  
        
    <div class="form-group">
   
        <label>Gender:</label>
    
       <?php echo generator::form('select','male','usergender','gender'); ?>
        <?php if(isset($errGender)){echo $errGender; }?>
    </div>

    <div class="form-group">
   
        <label>Role:</label>
    
        <?php echo generator::form('select','3','userrole','role'); ?>
        <?php if(isset($errRole)){echo $errRole; }?>
    </div>
        
    <div class="form-group">
   
        <label>Password:</label>
    
        <?php echo generator::form('password','userpassword','',''); ?>
        <?php if(isset($errPassword)){echo $errPassword; }?>
    </div>  
        
    <div class="form-group">
    
      <?php echo generator::form('submit','adduser','Add User',''); ?>
        
    </div>
        
    
        
    </div>
    <?php
    echo generator::formend();
        ?>
    </div>
    

    </div>

</div>

</div>
    
    
</div>