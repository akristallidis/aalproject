<?php
    class subscription {
    
        // database connection and table name
        private $conn;
        private $table_name = "subscription";
    
        // activities properties
        public $id;
        public $title;
        public $description;
        public $user_id;
    
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }

        function read($subscription){
           
		    $query = "SELECT * FROM subscription WHERE user_id='$subscription->user_id' ORDER BY event_date, event_time";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
        }
        
        function read_all($subscription){
           
		    $query = "SELECT * FROM subscription ORDER BY event_date, event_time";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
        }
        
        function create($subscription) {
            
            $query = "INSERT INTO subscription SET title='$subscription->title', description='$subscription->description', event_date='$subscription->event_date', event_time='$subscription->event_time', user_id='$subscription->user_id'";

		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;
        }
        
        function read_one($subscription){
            
            $query = "SELECT * FROM subscription WHERE id='$subscription->id'";
 
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;
        }
        
        function update($subscription) {
            
            $query = "UPDATE subscription SET title='$subscription->title', description='$subscription->description' WHERE id='$subscription->id'";

		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;            
        }
        
        function delete($subscription) {
            
            $query = "DELETE FROM subscription WHERE id='$subscription->id'";
            
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;  
        }
        
        function delete_all($subscription) {
            
            $query = "DELETE FROM subscription WHERE user_id='$subscription->user_id'";
            
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;  
        }
        
    }
?>