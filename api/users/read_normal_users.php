<?php

    session_start();
    
    if (!isset($_SESSION['valid'])) {
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/index.php';
            alert('Πρέπει να κάνετε Login.');
        </script>";
        session_destroy();
        exit();
    }
    
    // include database and users files
    include_once '../config/database.php';
    include_once '../objects/users.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize users
    $users = new users($db);

    $stmt = $users->read_normal_users($users);
    $num = $stmt->rowCount();
 
    // check if 1 record found
    if($num>0){
        
        $results[0] = array();
        $results[1] = array();
        
        $i = 0;
        
        // retrieve our table contents for all records
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                 
            // extract row
            extract($row);
            
            $results[$i][0] = $id;
            $results[$i][1] = $firstname;
            
            $i++;
 
         }
         
         $_SESSION['all_reminders_users'] = $results;
         
         $_SESSION['all_reminders_users_num'] = $num;
            
        header('location: http://aalproject.000webhostapp.com/aal/simple_users/reminders.php');
    }
    
?>