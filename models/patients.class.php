<?php
namespace Patients;

use \Database\DbConnect;

class information{

	
    public static function getpatient($id){
    
        $conn = DbConnect::getConnection();
        
        $stuff = [];
        
	   $stmt = $conn->prepare("SELECT * FROM hc_records LEFT OUTER JOIN hc_practitioner
ON hc_records.doctor=hc_practitioner.userid LEFT OUTER JOIN users
ON hc_records.patientid=users.id WHERE hc_records.patientid = :id ");
        
	   $stmt->bindValue(':id',$id);
        
	   $stmt->execute();
        
	   $stuff[] = $stmt->fetch();
        
        
        DbConnect::closeConnection();
        
        return $stuff;
        
        
            
    }
    
    
        public static function getpatientinformation($id){
    
            $conn = DbConnect::getConnection();
        
            $stuff = [];
        
	       $stmt = $conn->prepare("SELECT * FROM users LEFT OUTER JOIN hc_profiles
ON users.id=hc_profiles.userid WHERE users.id = :id ");
            
	       $stmt->bindValue(':id',$id);
        
	       $stmt->execute();
        
	       $stuff[] = $stmt->fetch();
        
            DbConnect::closeConnection();
        
            return $stuff;
        
        
            
    }
    
    
    public static function getalldocs(){
        
         $conn = DbConnect::getConnection();
        
        $stuff = [];
        
            $query = "SELECT * FROM hc_practitioner";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $stuff;
        
        
    }
    
        public static function getallappts($id){
        
         $conn = DbConnect::getConnection();
        
        $stuff = [];
        
            $query = "SELECT * FROM hc_appts WHERE patientid = ".$id."";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $stuff;
        
        
    }
    
        public static function getdocname($id){
            
            $conn = DbConnect::getConnection();
            
            $info = '';
        
            $query = "SELECT * FROM hc_practitioner WHERE id = ".$id."";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $info = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $info;
            
        }
    
    
          public static function getallnames(){
            
            $conn = DbConnect::getConnection();
            
            $info = [];
        
            $query = "SELECT id,name FROM users";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $stuff;
            
        }
    
    public static function adddoctor($fname,$lname,$doctorid){
        
        $trigger = 0;
        
           $conn = DbConnect::getConnection();
        
            $query = "SELECT * FROM hc_practitioner WHERE userid = ".$doctorid."";
         
	       $resultset = $conn->query($query);
        
            $number = $resultset->rowCount();
        
        DbConnect::closeConnection();
        
        
        
        if($number === 0){
            
                $conn = DbConnect::getConnection();
        
	       $stmt = $conn->prepare("INSERT INTO hc_practitioner (userid, fname, lname) VALUES (:id, :firstname, :lastname)");
            
	       $stmt->bindValue(':id',$doctorid);
        
            $stmt->bindValue(':firstname',$fname);
        
            $stmt->bindValue(':lastname',$lname);
        
	       $stuff = $stmt->execute();
        
            DbConnect::closeConnection();
            
            $trigger++;
            
        }
                
            return $trigger;
        
        
    }
    
    
              public static function getallapptslist($id){
            
            $conn = DbConnect::getConnection();
            
            $info = [];
        
            $query = "SELECT * FROM hc_appts WHERE patientid = ".$id." AND status = 0";
         
	       $resultset = $conn->query($query);
                  
                  $check = $resultset->rowCount();
                  
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
        if($check > 0){
            return $stuff;
        }
        elseif($check === 0)
        {
            return false;
        }
            
        }
    
}
?>