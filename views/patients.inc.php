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
    <?php
    if(!isset($_GET['choosepatient']) && !isset($_GET['id'])){?>
    <h3>Patients</h3>
    <?php
                                                             }
        elseif(isset($_GET['choosepatient']) && isset($_GET['id']))
        {
        ?>
        <h3>Patient Information</h3>
    <?php
        }
        ?>
    </div>
    
    <?php
    
    if(isset($_GET['choosepatient']) && isset($_GET['id'])){
    $information = information::getallappts($_GET['id']);
    
    if(count($information) > 0){?>
    <div class="col-lg-12">
        
    <h4>Appointments scheduled</h4>
        
    </div>
    
    <div class="col-lg-12">
        
    <div class="col-md-4">
        <h4>Date</h4>
    </div>
        
    <div class="col-md-4">
        <h4>Time</h4>
    </div>
        
    <div class="col-md-4">
        <h4>Doctor</h4>
    </div>
        
    </div>

    <?php
        foreach($information AS $lol){?>
    
           <?php $test = information::getdocname($lol['doctorid']); ?>
    
    <div class="col-lg-12">
        
    <div class="col-md-4">
    <?php echo $lol['date']; ?>
    </div>
        
    <div class="col-md-4">
    <?php echo $lol['time']; ?>
    </div>
        
    <div class="col-md-4">
    <?php echo $test['fname'].' '.$test['lname']; ?>
    </div>
        
    </div>
    
<?php
        }
                                ?>
    
        <?php
    }
    }
    ?>
    <?php if(!isset($_GET['choosepatient']) && !isset($_GET['adddiagnosis'])){?>
    
    <div class="col-lg-12">
        
                <div class="col-lg-12">
        <div class="col-md-4">Name</div>
        <div class="col-md-4">Appointments</div>
        <div class="col-md-4">&nbsp;</div>
        </div>
        
    <?php 
        $collection = stats::getpatients();
        
    foreach($collection AS $lol){

            $appointmentcheck = stats::getpatientappointment($lol['id']);
            ?>
    
        
        <div class="col-lg-12">
        <div class="col-md-4">        <?php
            
            echo $lol['name'];
            ?></div>
        <div class="col-md-4">        <?php
            
            if($appointmentcheck != 0){
            ?>
            Future Appointment
                    <?php
            }
            else
            {
            ?>
             No appointments
                    <?php
            }
            ?></div>
        <div class="col-md-4"><a href="?choosepatient&id=<?php echo $lol['id'];?>">Choose Patient</a></div>
        </div>
                
                                <?php
        }
        
    }
        ?>
<!--
            </tr>
        </table>
-->
    
    </div>
    <?php

    ?>
    
    <?php
    if(isset($_GET['choosepatient']) && isset($_GET['id']) && $_SESSION['role'] === '2'){?>
    <div class="col-lg-12">
        
        <?php
        
        $count = count(information::getpatient($_GET['id']));
        
        ?>
        
        <?php
        if($count > 0){?>
        <div class="col-lg-12">
        <h3>Past Patient Diagnoses</h3>
        
        </div>
        <div class="col-lg-12">
            
                <div class="col-md-3">
                <h4>Patient</h4>
                
                </div>
                
                <div class="col-md-3">
                <h4>Appt time</h4>
                
                </div>
                
                <div class="col-md-3">
                <h4>Doctor</h4>
                
                </div>
                
                <div class="col-md-3">
                <h4>Diagnosis</h4>
                
                </div>
            
            
        </div>   
            
        <?php    
        }?>
        
        <?php
        
        $information = information::getpatient($_GET['id']);
        
        for($i=0; $i < $count; $i++){
            $patientname = $information[$i]['name'];
            $apptime = $information[$i]['appt'];
            $doctor = $information[$i]['fname'].' '.$information[$i]['lname'];
            $diagnosis = $information[$i]['diagnosis'];
            
            ?>
        
            <div class="col-lg-12">
            
                <div class="col-md-3">
                <h4><?php echo $patientname; ?></h4>
                
                </div>
                
                <div class="col-md-3">
                <h4><?php echo $apptime; ?></h4>
                
                </div>
                
                <div class="col-md-3">
                <h4><?php echo $doctor; ?></h4>
                
                </div>
                
                <div class="col-md-3">
                <h4><?php echo $diagnosis; ?></h4>
                
                </div>
            
            
            </div>
        
        <?php
            if($_SESSION['role'] === '1' OR $_SESSION['role'] === '2'){?>
        <div class="col-lg-12">
        <a style="margin:5px;" class="btn btn-primary" href="?adddiagnosis&id=<?php echo $_GET['id']; ?>" title="Add Diagnosis" role="button">Add Diagnosis</a>
        
        </div>
        <?php
            }
            ?>
        
        <?php
            
        }
        
        ?>
    </div>
    
    <?php
    }
    ?>
    <?php
    if(isset($_GET['adddiagnosis']) && isset($_GET['id'])){?>
    
    <div class="col-lg-12">
        <h4>Patient Diagnosis Information</h4>
        
        <?php
        echo generator::formopen('open','patients.php','post');
        
        echo generator::form('hidden','patientid',$_GET['id'],'');
        
        echo generator::formstart('0','');
        
        echo generator::form('text','diagnosis','Enter your diagnosis here','');
        
        echo generator::formend();

        ?>
        
        <div class="form-group">
        <select class="form-control" name="patientappt">
        <?php
        $tag = information::getallapptslist($_GET['id']);
        
        if($tag != 0){
        foreach($tag AS $lol){?>
        
            <option value="<?php echo $lol['id']; ?>"><?php echo $lol['date']; ?>&nbsp;<?php echo $lol['time']; ?></option>
        
        <?php
        }
        ?>
            </select>
        </div>
        <?php
                echo generator::formstart('0','');
        
        echo generator::form('submit','diagnosis','Enter your diagnosis here','');
        
        echo generator::formend();
        
        echo generator::formopen('close','','','');
        ?>
        
    </div>
    <?php
                                                           }
    }
    else
    {
    ?>
    <div class="col-lg-12">No appointments booked for patient</div>
    <?php
    }
    ?>
    </div>

</div>

</div>
    
    
</div>