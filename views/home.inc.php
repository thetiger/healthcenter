<?php
use Stats\stats;
?>

<div class="container-lg">

<div class="row">

<div class="container">

<div class="row">
    
    <div class="col-lg-12">
    
        <h3><?php echo 'Welcome, '.$_SESSION['name']; ?></h3>
    
    </div>
    
    <?php
    if($_SESSION['role'] === '1'){?>
    <div class="col-md-6">
        <?php
        foreach(stats::getevents('1') AS $jon){
            if($jon != 0){
            echo 'There are currently: '.$jon.' appointments registered on the system.'; }
            else
            {?>
              <p>There are currently no appointments on the system!</p>  
        <?php
            }
        }
                                 ?>
    </div>
    <?php
                               }
    ?>

    </div>

</div>

</div>
    
    
</div>