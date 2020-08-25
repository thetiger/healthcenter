<?php
namespace Stats;

use \Database\DbConnect;

class stats{

	
    public static function getevents($id){
    
        $conn = DbConnect::getConnection();
        
        $stuff = [];
        
        if($id === '1'){
            $query = "SELECT * FROM hc_appts LIMIT 10";
         
	       $resultset = $conn->query($query);
        
            $number = $resultset->execute();
            
            $number = $resultset->rowCount();
            
            array_push($stuff, $number);
            
        }
        
        DbConnect::closeConnection();
        
     
            return $stuff;
            
        
        
    }
    
    public static function getpatients(){
        
         $conn = DbConnect::getConnection();
        
        $stuff = [];
        
            $query = "SELECT * FROM users LIMIT 10";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $stuff;
        
        
    }
    
        public static function getpatientappointment($id){
    
        $conn = DbConnect::getConnection();
        $number = 0;
            
        if($id){
            
            $query = "SELECT * FROM hc_appts WHERE patientid = ".$id."";
         
	       $resultset = $conn->query($query);
        
            $number = $resultset->execute();
            
            $number = $resultset->rowCount();
        
            
        }
        
        DbConnect::closeConnection();
        
     
            return $number;
            
        
        
    }
    
    
    public static function getusers(){
        
         $conn = DbConnect::getConnection();
        
        $stuff = [];
        
            $query = "SELECT * FROM users";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $stuff;
        
        
    }
    
    
    public static function getinformation($table){
        
                 $conn = DbConnect::getConnection();
        
        $stuff = [];
        
            $query = "SELECT * FROM ".$table."";
         
	       $resultset = $conn->query($query);
            
	       while ($patients = $resultset->fetch()) {
               
                $stuff[] = $patients;
               
	           }
            
        
        DbConnect::closeConnection();
        
     
            return $stuff;
        
        
    }
    
    
}
?>