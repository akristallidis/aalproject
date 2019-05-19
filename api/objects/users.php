<?php

    class users{
 
        // database connection and table name
        private $conn;
        private $table_name = "activities";
 
        // users propertiesac
        public $id;
		public $firstname;
		public $lastname;
		public $birthdate;
		public $town;
		public $address;
        public $password;
        public $user_type;
 
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function read($users){
 
		    $query = "SELECT * FROM users WHERE id='$users->id'";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;
        }
        
        function read_social_users($users) {
            
            $query = "SELECT * FROM users WHERE user_type='social' ";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
            
        }
        
        function read_normal_users($users) {
            
            $query = "SELECT * FROM users WHERE user_type='normal' ";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
            
        }
        
        function return_social_description($users) {
            
            $query = "SELECT lastname FROM users WHERE id='$users->id' ";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
            
        }
		
		function login($users){
			
			$query = "SELECT id FROM users WHERE id='$users->id' AND password='$users->password'";
	
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
    
		    // execute query
		    $stmt->execute();
		
		    return $stmt;
        }
        
        function sign_up($users) {
            
            $check_query = "SELECT * FROM users WHERE id='$users->id'";
            $check_stmt = $this->conn->prepare($check_query);
		    $check_stmt->execute();
            $num = $check_stmt->rowCount();
            
            if ($num==0) {
                
                $query = "INSERT INTO users SET id='$users->id', firstname='$users->firstname', lastname='$users->lastname', birthdate='$users->birthdate', town='$users->town', address='$users->address', phone='$users->phone', password='$users->password', user_type='$users->user_type'";

		        // prepare query statement
		        $stmt = $this->conn->prepare($query);
            
		        // execute query
		        $stmt->execute();
		    
		        return $stmt;
		        
            }
            
        }
        
        function update_data($users) {
            
            $query = "UPDATE users SET firstname='$users->firstname', lastname='$users->lastname', birthdate='$users->birthdate', town='$users->town', address='$users->address', phone='$users->phone' WHERE id='$users->id'";

		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;            
        }
        
        function update_password($users) {
            
            $query = "UPDATE users SET password='$users->password' WHERE id='$users->id'";

		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;            
        }
        
        function delete($users) {
            
            $query = "DELETE FROM users WHERE id='$users->id'";
            
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;  
        }
        
        function return_user_type($users) {
            
            $query = "SELECT user_type FROM users WHERE id='$users->id'";
            
            // prepare query statement
		    $stmt = $this->conn->prepare($query);
            
		    // execute query
		    $stmt->execute();
		    
		    return $stmt;
        }
    }
?>