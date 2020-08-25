<?php
use Stats\stats;
use Patients\information;
use Forms\generator;
use \Accounts\accounts;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <div class="col-lg-12">
    
    <h3>Create an appointment</h3>
    
    </div>

    <div class="col-lg-12">
    <?php
        
        if(isset($_POST['addappt']) && $_SESSION['role'] === '1'){
            
        echo count(generator::submitappt($_POST['time'],$_POST['date'],$_POST['patient'],$_POST['doctorlist']));
        }
        
        if($_SESSION['role'] === '1'){
            
        echo generator::formopen('open','appointments.php','post');
        
        echo generator::formstart('1','Appointment Time');
        
        echo generator::form('select','','time','time');
        
        echo generator::formend();
        
        echo generator::formstart('1','Appointment Date');
        
        echo generator::form('select','','date','date');
        
        echo generator::formend();
        
        echo generator::formstart('1','Patient');
        
        echo generator::form('select','','patient','patient');
        
        echo generator::formend();
        
        echo generator::formstart('1','Doctor');
        
        echo generator::form('select','','doctorlist','doctorlist');
        
        echo generator::formend();
        
        echo generator::formstart('0','');
        
        echo generator::form('submit','addappt','Add Appointment','');
        
        echo generator::formend();
        
        echo generator::formopen('close','','','');
        
        echo generator::formend();
            
        }
        else
        {?>
            <h3>You are not allowed to view this webpage.</h3>
        <?php } ?>
    </div>
    
    </div>

</div>

</div>
    
    
</div>