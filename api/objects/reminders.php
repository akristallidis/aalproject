<?php
    class reminders {
    
        // database connection and table name
        private $conn;
        private $table_name = "reminders";
    
        // reminders properties
        public $id;
        public $name;
        public $description;
        public $alarm_time;
        public $repeated;
        public $user_id;
    
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }

        function read($reminders){
           
		    $query = "SELECT * FROM reminders WHERE user_id='$reminders->user_id' ORDER BY alarm_date, alarm_time";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
        }
        
        function create($reminders) {
            
            $query = "INSERT INTO reminders SET name='$reminders->name', description='$reminders->description', alarm_date='$reminders->alarm_date', alarm_time='$reminders->alarm_time', repeated='$reminders->repeated', user_id='$reminders->user_id'";

		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;
        }
        
        function read_one($reminders){
            
            $query = "SELECT * FROM reminders WHERE id='$reminders->id'";
 
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;
        }
        
        function update($reminders) {
            
            $query = "UPDATE reminders SET name='$reminders->name', description='$reminders->description', alarm_date='$reminders->alarm_date', alarm_time='$reminders->alarm_time', repeated='$reminders->repeated' WHERE id='$reminders->id'";

		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;            
        }
        
        function delete($reminders) {
            
            $query = "DELETE FROM reminders WHERE id='$reminders->id'";
            
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;  
        }
        
        function delete_all($reminders) {
            
            $query = "DELETE FROM reminders WHERE user_id='$reminders->user_id'";
            
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt; 
        }
    }
?>