<?php
use Stats\stats;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <?php
    if($_SESSION['role'] != '1'){?>
        
    <div class="col-lg-12">
    <h4>This information is secure, you're not allowed to be here.</h4>
    
    </div>
        <?php
    }
    else
    {
    ?>
    <div class="col-lg-12">
    
        <h4>Here you manage the users of the system, this includes registration of new patients, doctors and other staff.</h4>
    
    </div>
    
    <?php 
    $users = stats::getusers();
    ?>
    <div class="col-lg-12" style="margin-bottom:10px;">
    <?php
        $count = count(stats::getusers());
        $information = stats::getusers();
        
        if($count != 0){ ?>
        
            <div class="col-md-3">
            <h4>Name</h4>
            
            </div>
            
             <div class="col-md-3">
            <h4>Email</h4>
            
            </div>
            
             <div class="col-md-3">
            <h4>Role</h4>
            
            </div>
            
             <div class="col-md-3">
                 &nbsp;
            
            </div>
    
        <?php
        }
        
        for($i=0; $i < $count; $i++){ ?>
        
        <div class="col-lg-12" style="padding:5px;">
            
        <div class="col-md-3">
            <?php echo $information[$i]['name']; ?>
        </div>
            
        <div class="col-md-3">
            <?php echo $information[$i]['email']; ?>
        </div>
            
        <div class="col-md-3">
            <?php 
                              if($information[$i]['role'] === '1'){
                                  
                                  echo 'Receptionist';
                              }
                            if($information[$i]['role'] === '2'){
                                  
                                  echo 'Doctor';
                              }
                            if($information[$i]['role'] === '3'){
                                  
                                  echo 'Patient';
                              } 
                    ?>
        </div>
            
        <div class="col-md-3">
            <a style="padding:5px;" class="btn btn-primary" href="edituser.php?id=<?php echo $information[$i]['id']; ?>" role="button"><span class="glyphicon glyphicon-user"></span>&nbsp;Edit User</a>
        </div>
        
        </div>
            
        <?php
            
        }
        
        ?>
                
        <div class="col-lg-12">
            <a style="padding:5px;"class="btn btn-primary" href="adduser.php" role="button"><span class="glyphicon glyphicon-user"></span>&nbsp;Add User</a>
        </div>
        <div class="col-lg-12" style="margin-top:5px">
            <a style="padding:5px;" class="btn btn-primary" href="adddoctor.php" role="button"><span class="glyphicon glyphicon-user"></span>&nbsp;Add Doctor</a>
        </div>
    </div>
    
    <?php
    }
    ?>

    </div>

</div>

</div>
    
    
</div>