<?php
use Stats\stats;
use Patients\information;
use Forms\generator;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <div class="col-lg-12">
    
        <h4>You are currently editing this persons account.</h4>
    
    </div>
    
    <div class="col-lg-12 table-responsive">
    <?php
        $count = count(information::getpatientinformation($id));
        
        $information = information::getpatientinformation($id);
        
        $seeder = [];
        
        $seeder = array_push($seeder,'male','female');
        
        for($i=0; $i < $count; $i++){?>
        
         <?php
        echo generator::formopen('open','edituser.php','post');
                                     ?>
        
        <div class="col-lg-12">
        
            <div class="col-md-6">
            
                <div class="col-lg-12">
                    
                            <?php echo generator::form('hidden','user',$_GET['id'],''); ?>
                
                    <div class="form-group">
                    <label>id:</label>
                    <?php echo $information[$i][0]; ?>  
                    </div>
                    
                      <div class="form-group">
                    <label>Name:</label>
                    <?php echo $information[$i]['name']; ?>   
                    </div>
                    
                      <div class="form-group">
                    <label>Date of Birth:</label>
                    <?php echo generator::form('date','patientdob',$information[$i]['dob'],''); ?> 
                    </div>
                    
                                
                  <div class="form-group">
                    <label>Address</label>
                    <?php echo generator::form('textarea','patientaddress',$information[$i]['address'],''); ?> 
                    </div>
                    
                    
                </div>
                
            </div>
            
            <div class="col-md-6">
                
                  <div class="form-group">
                    <label>Phone</label>
                    <?php echo generator::form('text','patientphone',$information[$i]['phone'],'phone'); ?> 
                    </div>
                
                  <div class="form-group">
                    <label>Gender</label>
                    <?php echo generator::form('select',$information[$i]['sex'],'gender','gender'); ?>
                    </div>
                
                 <div class="form-group">
                    <label>Role</label>
                    <?php echo generator::form('select',$information[$i]['role'],'role','role'); ?>
                    </div>
                
                   <div class="form-group">
                            <?php echo generator::form('submit','updateuser','Update User',''); ?>
                    </div>
            
            </div>
        
        </div>
        
       <?php
        echo generator::formend();
        ?>
            
         <?php
        }
        ?>
    
    </div>

    
    </div>

    </div>

</div>

</div>