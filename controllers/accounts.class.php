<?php
namespace Accounts;

use \Database\DbConnect;

class accounts
{

    static function login(){
    
        $email = @$_POST['email'];
        $password = @$_POST['password'];
        
        $info = '';
        
        $conn = DbConnect::getConnection();
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            
	       $stmt->bindValue(':email',$email);
            
	       $stmt->execute();
        
            $music = $stmt->rowCount();
        
            if($music > 0){
                
                while($data = $stmt->fetch()){
                    
                    if(password_verify($password, $data['password']) === true){
                                            
                        $info = $data;
                        
                        
                        
                    }
                    else
                    {
                     header('Location: index.php?line1');   
                    }
                    
                    
                }
            }
        
        if($music === 0)
        {
            $info = 'Nothing matches our records, you have not been logged-in';
        }
        
        return $info;
        
		DbConnect::closeConnection();
    
    }
    
    static function createuser($name,$dob,$address,$number,$gender,$role,$email,$password){

     $info = '';
        
        $catch = 0;
        
        $conn = DbConnect::getConnection();
        
        $password = self::generatepassword($password);
        
	   $stmt=$conn->prepare("INSERT INTO users (name, email, password, role)VALUES(:name, :email, :password, :role)");
        
	   $stmt->bindValue(':name', $name);
        
	   $stmt->bindValue(':email', $email);
        
	   $stmt->bindValue(':password', $password);
        
	   $stmt->bindValue(':role', $role);
        
	   $affected_rows = $stmt->execute();
        
        $catch++;
        
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            
	       $stmt->bindValue(':email',$email);
        
            $stmt->bindValue(':password',$password);
            
	       $stmt->execute();
        
            $music = $stmt->rowCount();
        
                $catch++;
        
            if($music > 0){
                
                while($data = $stmt->fetch()){
                    
                    $info[] = $data;
                    
                    
                }
                
                $count = count($info);
                
                for($i=0; $i < $count; $i++){
                    
                            if($info[$i]['role'] === '2'){
                                
                                $query="INSERT INTO hc_practitioner (userid,fname,lname) VALUES (:userid,:fname,:lname)";
        
	                       $stmt=$conn->prepare($query);
        
	                       $stmt->bindValue(':userid', $info[$i]['id']);
        
	                       $stmt->bindValue(':fname', $info[$i]['name']);
                                
                        $stmt->bindValue(':lname', $info[$i]['role']);
        
	                       $affected_rows = $stmt->execute();
                                
                                        $catch++;
                            }
                    
                    	   $query="INSERT INTO hc_profiles (name,userid,address,phone,sex,dob) VALUES (:name, :userid, :address, :phone, :gender, :dob)";
        
	                       $stmt=$conn->prepare($query);
        
                            $stmt->bindValue(':name', $info[$i]['name']);
        
	                       $stmt->bindValue(':userid', $info[$i]['id']);
        
	                       $stmt->bindValue(':address', $address);
        
	                       $stmt->bindValue(':phone', $number);
                
                            $stmt->bindValue(':gender', $gender);
                    
                            $stmt->bindValue(':dob', $dob);
                    
	                       $affected_rows = $stmt->execute();
                    
                            $catch++;
                    
                }
            }
        
        DbConnect::closeConnection();

}
    
    public static function addappt($time,$date,$patient,$doctor){
        
        
       $conn = DbConnect::getConnection();
        
	   $stmt=$conn->prepare("
       
       INSERT INTO hc_appts (patientid, date, time, doctorid) VALUES (:patient, :date, :time, :doctor)");
        
	   $stmt->bindValue(':patient', $patient);
        
	   $stmt->bindValue(':date', $date);
        
	   $stmt->bindValue(':time', $time);
        
	   $stmt->bindValue(':doctor', $doctor);
        
	   $affected_rows = $stmt->execute();
        
     DbConnect::closeConnection();
        
        return $affected_rows;
        
        
    }
    
    
    public static function generatepassword($password){
        
        $lol = password_hash($password, PASSWORD_DEFAULT);  
        
        return $lol;
        
    }
        
        
        
    }