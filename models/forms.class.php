<?php
namespace Forms;

use \Database\DbConnect;
use \DateTime;
use \Stats\stats;
use \Accounts\accounts;
use \Patients\information;

class generator{

	
    public static function form($type,$value,$binder,$seeder){
        
        $info = '';
        
        if($type === 'text'){
            
            $info = '<input class="form-control" type="text" name="'.$value.'" placeholder="'.$binder.'">';
            
        }
        
        if($type === 'text' && $seeder === 'phone'){
            
            $info = '<input class="form-control" type="text" name="'.$value.'" placeholder="'.$binder.'" value="'.$binder.'">';
            
        }
        
         if($type === 'submit'){
            
            $info = '<input class="form-control" type="submit" name="'.$value.'" value="'.$binder.'">';
            
        }
        
        if($type === 'hidden'){
            
            $info = '<input class="form-control" type="hidden" name="'.$value.'" value="'.$binder.'">';
            
        }
        
        if($type === 'date'){
            
            $info = '<input class="form-control" type="date" name="'.$value.'" value="'.$binder.'">';
            
        }
        
        if($type === 'password'){
            
            $info = '<input class="form-control" type="password" name="'.$value.'" value="'.$binder.'">';
            
        }
        
         if($type === 'email'){
            
            $info = '<input class="form-control" type="email" name="'.$value.'" placeholder="'.$binder.'">';
            
        }
        
         if($type === 'textarea'){
            
            $info = '<textarea class="form-control" name="'.$value.'">'.$binder.'</textarea>';
            
        }
        
        if($type === 'select' && $seeder === 'gender'){
            
          $info .= '<select class="form-control" name="'.$binder.'">';
          if($value === 'male'){
              
              $info .= '<option value="male" selected="selected">Male</option>';
              $info .= '<option value="female">Female</option>';
              
          }
         if($value === 'female'){
              
              $info .= '<option value="female" selected="selected">Female</option>';
              $info .= '<option value="male">Male</option>';
              
          }
          $info .= '</select>';
            
        }
        
        if($type === 'select' && $seeder === 'role'){
            
          $info .= '<select class="form-control" name="'.$binder.'">';
            
          if($value === '1'){
              
              $info .= '<option value="1" selected="selected">Receptionist</option>';
              $info .= '<option value="2">Doctor</option>';
              $info .= '<option value="3">Patient</option>';
              
          }
         if($value === '2'){
              
              $info .= '<option value="1">Receptionist</option>';
              $info .= '<option value="2" selected="selected">Doctor</option>';
              $info .= '<option value="3">Patient</option>';
              
          }
         if($value === '3'){
              
              $info .= '<option value="1">Receptionist</option>';
              $info .= '<option value="2">Doctor</option>';
              $info .= '<option value="3" selected="selected">Patient</option>';
              
          }
          $info .= '</select>';
            
        }
        
        if($type === 'select' && $seeder === 'time'){
            
                      $info .= '<select class="form-control" name="'.$binder.'">';
            
       
            for($i = 9; $i < 18; $i++){
                
                for($j = 0; $j < 60; $j++){

                        $info .= '<option value="'.sprintf("%02d", $i).':'.sprintf("%02d", $j).'">'.sprintf("%02d", $i).':'.sprintf("%02d", $j).'</option>';

            }
                
            }
            
          $info .= '</select>';
            
            
            
        }
        
        if($type === 'select' && $seeder === 'date'){
            
                      $info .= '<select class="form-control" name="'.$binder.'">';
            $dates = [];
       
            for($i = 1; $i < 31; $i++){
                
                for($j = 1; $j < 13; $j++){
                    
                    for($s = 17; $s < 18; $s++){
                        

                        $info .= '<option value="'.sprintf("%02d", $i).'-'.sprintf("%02d", $j).'-20'.sprintf("%02d", $s).'">'.sprintf("%02d", $i).'/'.sprintf("%02d", $j).'/20'.sprintf("%02d", $s).'</option>';

                    }
            }
                
            }
            
          $info .= '</select>';
            
            
            
        }
        
                if($type === 'select' && $seeder === 'patient'){

            
                      $info .= '<select class="form-control" name="'.$binder.'">';

                    
                    $tester = stats::getusers();
                        
                    foreach($tester AS $lol){
             $info .= '<option value="'.$lol['id'].'">'.$lol['name'].'</option>';
                    }
            
          $info .= '</select>';
            
            
            
        }
        
        if($type === 'select' && $seeder === 'doctorlist'){

            
                      $info .= '<select class="form-control" name="'.$binder.'">';

                    
                    $tester = information::getalldocs();
                        
                    foreach($tester AS $lol){
             $info .= '<option value="'.$lol['id'].'">'.$lol['fname'].' '.$lol['lname'].'</option>';
                    }
            
          $info .= '</select>';
            
            
            
        }
        
         if($type === 'select' && $seeder === 'users'){

            
                      $info .= '<select class="form-control" name="'.$binder.'">';

                    
                    $tester = information::getallnames();
                        
                    foreach($tester AS $lol){
             $info .= '<option value="'.$lol['id'].'">'.$lol['name'].'</option>';
                    }
            
          $info .= '</select>';
            
            
            
        }
        
        $stuff = information::getallnames();
        
        
        
        return $info;
        
        
        
            
    }
    
    public static function formopen($open,$action,$method){
        
        $info = '';
        
        if($open === 'open'){
            
        if($action && $method = 'post'){
            
            $info .= '<form method="'.$method.'" action="'.$action.'">';
            
        }
            
        }
        
        if($open === 'close'){
            $info .= '</form>';
        }
        
        
        
        return $info;
        
    }
    
    public static function formstart($id,$label){
        
        $info = '';
        
        if($id =1){
        $info.= '<div class="form-group">';
        $info .= '<label>'.$label.'</label>';
            
        }
        if($id = 0){
            
        $info.= '<div class="form-group">';

        }
        return $info;
        
    }
    
      public static function formend(){
        
        $info = '';
        
        $info .= '</div>';
        
        return $info;
        
    }
    
    public static function checkgender($input){
        
        $switch = false;
        
        if($input === 'male' || $input === 'female'){
            
            $switch = true;
            
        }
        
        return $switch;
        
        
    }
    
    public static function checkrole($input){
        
        $switch = false;
        
        if($input === '1' || $input === '2' || $input === '3'){
            
            $switch = true;
            
        }
        
        return $switch;
        
        
    }
    
        public static function checktext($input){
        
        $switch = false;
        
        if(strlen($input) < 20){
            
            $switch = true;
            
        }
        
        return $switch;
        
        
    }
    
    
    public static function vetinput($input){
        
        $switch = false;
        
        if(empty($input) || $input = ''){
            
            $switch = true;
        }
        
        return $switch;
        
    }
    
    public static function submitformdata(){
    
    $errs = 0;
    
    $name = @$_POST['username'];
    $dob = @$_POST['userdob'];
    $address = @$_POST['useraddress'];
    $number = @$_POST['usernumber'];
    $gender = @$_POST['usergender'];
    $role = @$_POST['userrole'];
    
    if(generator::vetinput($name) === true){
        $errName = '<div class="alert alert-warning">
  <strong>Warning!</strong> Empty Field
</div>';
        $errs++;
    }
    if(generator::checktext($name) == false){
        $errName = '<div class="alert alert-warning">
  <strong>Warning!</strong> Too many characters
</div>';
        $errs++;
    }
    
    if(generator::vetinput($dob) === true){
        $errDob = '<div class="alert alert-warning">
  <strong>Warning!</strong> Empty Field
</div>';
        $errs++;
    }
    if(generator::checkdate($dob) == false){
        $errDob = '<div class="alert alert-warning">
  <strong>Warning!</strong> Wrong Dob
</div>';
        $errs++;
    }
    
     if(generator::vetinput($number) === true){
        $errNumber = '<div class="alert alert-warning">
  <strong>Warning!</strong> Empty Field
</div>';
        $errs++;
    }
    if(generator::checktext($number) == false){
        $errNumber = '<div class="alert alert-warning">
  <strong>Warning!</strong> Too many characters
</div>';
        $errs++;
    }
    
    if(generator::checkgender($gender) == false){
        $errGender = '<div class="alert alert-warning">
  <strong>Warning!</strong> Are you an Alien?
</div>';
        $errs++;
    }
    
    if(generator::checkrole($role) == false){
        $errRole = '<div class="alert alert-warning">
  <strong>Warning!</strong> What is your role?
</div>';
        $errs++;
    }
        
        if($errs === 0){
            
            accounts::createuser($name,$dob,$address,$number,$gender,$role,$email);
            
        }
        
    }
    
        public static function submitappt($time,$date,$patient,$doctor){
            
            $time = @$_POST['time'];
            $date = @$_POST['date'];
            $patient = @$_POST['patient'];
            $doctor = @$_POST['doctorlist'];
            
            
            accounts::addappt($time,$date,$patient,$doctor);
            
            
            
            
        }
    
            public static function submitdoctor($firstname,$lastname,$id){
            
            
            
            
            patients::adddoctor($time,$date,$patient,$doctor);
            
            
            
            
        }
    
    
    
    
    
}
?>