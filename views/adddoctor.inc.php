<?php
use Stats\stats;
use Forms\generator;
use Patients\information;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <?php
     if(isset($_POST['adddoctor']) && $_SESSION['role'] === '1'){
            
        $getthis = information::adddoctor($_POST['fname'],$_POST['lname'],$_POST['doctor']); 
    
    ?>
         
         <?php
         if($getthis > 0){ ?>
        
        Everything has gone through ok.
             
             <?php
         }
         ?>
             <?php
         if($getthis === 0){ ?>
        
        This user already exists as a doctor, Doc...
             
             <?php
         }
         ?>
         <?php
        }
    ?>
    
   <?php
        echo generator::formopen('open','adddoctor.php','post');
        
        echo generator::formstart('1','Fore Name');
        
        echo generator::form('text','fname','Add Doctors first name here','');
    
         echo generator::formstart('1','Surname');
        
        echo generator::form('text','lname','Add Doctors Surname here','');
    
        echo generator::formstart('1','User');
        
        echo generator::form('select','','doctor','users');
    
        echo generator::formend();
    
        echo generator::formstart('0','');
        
        echo generator::form('submit','adddoctor','Add Doctor','');
        
        echo generator::formend();
        
        echo generator::formopen('close','','','');
        
        echo generator::formend();
    
    ?>

    </div>

</div>

</div>
    
    
</div>