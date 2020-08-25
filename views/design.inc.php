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
    <h3>Database dump for 'healthcentre'</h3>
    </div>
    
    <?php
    
    $table = 'hc_appts';
    
    $information = stats::getinformation($table);
    ?>
    <div class="col-lg-12">
    <h3><?php echo $table; ?></h3>
    </div>
    <div class="col-lg-12">
    <div class="col-md-2">id</div>
    <div class="col-md-2">patientid</div>
    <div class="col-md-2">date</div>
    <div class="col-md-2">time</div>
    <div class="col-md-2">doctorid</div>
    <div class="col-md-2">status</div>
    
    </div>
    <?php
    
    foreach($information AS $info){
    ?>
    <div class="col-lg-12">
    <div class="col-md-2"><?php echo $info['id']; ?></div>
    <div class="col-md-2"><?php echo $info['patientid']; ?></div>
    <div class="col-md-2"><?php echo $info['date']; ?></div>
    <div class="col-md-2"><?php echo $info['time']; ?></div>
    <div class="col-md-2"><?php echo $info['doctorid']; ?></div>
    <div class="col-md-2"><?php echo $info['status']; ?></div>
    
    </div>
<?php
    }
    ?>

        <?php
    
    $table = 'hc_practitioner';
    
    $information = stats::getinformation($table);
    ?>
    <div class="col-lg-12">
    <h3><?php echo $table; ?></h3>
    </div>
    <div class="col-lg-12">
    <div class="col-md-3">id</div>
    <div class="col-md-3">userid</div>
    <div class="col-md-3">fname</div>
    <div class="col-md-3">lname</div>
    
    </div>
    <?php
    
    foreach($information AS $info){
    ?>
    <div class="col-lg-12">
    <div class="col-md-3"><?php echo $info['id']; ?></div>
    <div class="col-md-3"><?php echo $info['userid']; ?></div>
    <div class="col-md-3"><?php echo $info['fname']; ?></div>
    <div class="col-md-3"><?php echo $info['lname']; ?></div>
    
    </div>
<?php
    }
    ?>
    
        <?php
    
    $table = 'hc_profiles';
    
    $information = stats::getinformation($table);
    ?>
    <div class="col-lg-12">
    <h3><?php echo $table; ?></h3>
    </div>
    <div class="col-lg-12">
    <div class="col-md-2">id</div>
    <div class="col-md-2">practitioner</div>
    <div class="col-md-2">dob</div>
    <div class="col-md-2">name</div>
    <div class="col-md-2">userid</div>
    <div class="col-md-2">address</div>
    
    </div>
    
    <div class="col-lg-12">
    <div class="col-md-6">
    Phone
        
    </div>
        
    <div class="col-md-6">
    sex
        
    </div>
    
    </div>
    <?php
    
    foreach($information AS $info){
    ?>
    <div class="col-lg-12">
    <div class="col-md-2"><?php echo $info['id']; ?></div>
    <div class="col-md-2"><?php echo $info['practitioner']; ?></div>
    <div class="col-md-2"><?php echo $info['dob']; ?></div>
    <div class="col-md-2"><?php echo $info['name']; ?></div>
    <div class="col-md-2"><?php echo $info['userid']; ?></div>
    <div class="col-md-2"><?php echo $info['address']; ?></div>
    
    </div>
    <div class="col-lg-12">
    <?php echo $info['phone']; ?>    
    <div class="col-md-6">
        
    </div>
        
    <div class="col-md-6">
     <?php echo $info['sex']; ?>   
    </div>
        
    </div>
<?php
    }
    ?>
    
        <?php
    
    $table = 'hc_records';
    
    $information = stats::getinformation($table);
    ?>
    <div class="col-lg-12">
    <h3><?php echo $table; ?></h3>
    </div>
    <div class="col-lg-12">
    <div class="col-md-2">id</div>
    <div class="col-md-2">patientid</div>
    <div class="col-md-2">appt</div>
    <div class="col-md-2">diagnosis</div>
    <div class="col-md-2">date</div>
    <div class="col-md-2">doctor</div>
    
    </div>
    <?php
    
    foreach($information AS $info){
    ?>
    <div class="col-lg-12">
    <div class="col-md-2"><?php echo $info['id']; ?></div>
    <div class="col-md-2"><?php echo $info['patientid']; ?></div>
    <div class="col-md-2"><?php echo $info['appt']; ?></div>
    <div class="col-md-2"><?php echo $info['diagnosis']; ?></div>
    <div class="col-md-2"><?php echo $info['date']; ?></div>
    <div class="col-md-2"><?php echo $info['doctor']; ?></div>
    
    </div>
<?php
    }
    ?>
    
        <?php
    
    $table = 'users';
    
    $information = stats::getinformation($table);
    ?>
    <div class="col-lg-12">
    <h3><?php echo $table; ?></h3>
    </div>
    <div class="col-lg-12">
    <table>
    <tr>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    <th>password</th>
    <th>role</th>
    </tr>   
    
    <?php
    
    foreach($information AS $info){
    ?>
            <tr>
        <td><?php echo $info['id']; ?></td>
        <td><?php echo $info['name']; ?></td>
        <td><?php echo $info['email']; ?></td>
        <td><?php echo $info['password']; ?></td>
        <td><?php echo $info['role']; ?></td>
        </tr>
<?php
    }
    ?>
        </table>
    </div>
        
    
    
    
    </div>

</div>

</div>
    
    
</div>