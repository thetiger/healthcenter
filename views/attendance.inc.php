<?php
use Stats\stats;
use Forms\generator;
use Patients\information;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <div class="col-lg-12">
    <h3>Confirm your attendance here</h3>
    </div>
    
    <?php
            if(isset($_POST['confirmattendance'])){
            
        echo 'Your attendance has been confirmed, please take a seat.';
        }
    ?>
    
            <?php
        echo generator::formopen('open','attendance.php','post');
        
    echo generator::formstart('1','Your date of birth:');
    
        echo generator::form('date','dob','','date');
        
        echo generator::formstart('0','');
    ?>
         <div class="form-group">
                            <?php echo generator::form('submit','confirmattendance','Confirm Attendance',''); ?>
                    </div>
    
    <?php

        echo generator::formend();

        ?>

    </div>

</div>

</div>
    
    
</div>