<div class="container-lg header">

<div class="row">

<div class="container">

<div class="row">
    
        <div class="col-lg-12" style="margin-bottom:10px;">
    
            <img src="images/core/headertag.png" class="img-responsive center-block">
        </div>
    
    <div class="col-lg-12">
   <?php if(!isset($_SESSION['role'])){?> &nbsp; <?php } ?>
        <?php if(isset($_SESSION['role'])){?>
        <div id="hcs" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="system.php">Home</a>
                </li>
                <?php
                if($_SESSION['role'] === '1' OR $_SESSION['role'] === '2'){?>
                <li><a href="patients.php">Patients</a>
                <?php
                }
                ?>
                </li>
                 <?php
                if($_SESSION['role'] === '1'){?>
                <li><a href="users.php">Users</a>
                <?php
                }
                ?>
                </li>
                <?php if($_SESSION['role'] === '1') {?>
                <li><a href="appointments.php">Appointments</a>
                <?php
                    }
                    ?>
                </li>
                <?php
                if($_SESSION['role'] == '3'){?>
                <li><a href="checkin.php">Check In</a>
                <?php
                }
                ?>
                </li>
                <?php
                if($_SESSION['role']){?>
                <li><a href="logout.php">Logout</a>
                <?php
                }
                ?>
                </li>
            </ul>
        </div>
    </div>
</div>
        <?php
}
        ?>
    
    </div>

    </div>

</div>

</div>
    
    
</div>