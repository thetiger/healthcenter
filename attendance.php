<?php
session_start();

require_once('controllers/db.class.php');

require_once('models/stats.class.php');

require_once('models/patients.class.php');

require_once('models/forms.class.php');

include('views/headerhtml.inc.php');

include('views/bodystart.inc.php');

include('views/header.inc.php');

include('views/attendance.inc.php');

include('views/footer.inc.php');

include('views/bodyend.inc.php');

?>