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
 
    // include database and activities files
    include_once '../config/database.php';
    include_once '../objects/reminders.php';

    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize activities
    $reminders = new reminders($db);
    
    // check for no empties parameter
    if(!empty($_SESSION['user_id'])) {
        
        // set activities property values
        $reminders->user_id = $_SESSION['user_id'];
        
        $stmt = $reminders->read($reminders);
        $num = $stmt->rowCount();
 
        // check if more than 0 record found
        if($num>0){
            
            $rslts = array();
            $results[0] = array();
            $results[1] = array();
            
            $i = 0;
            
            // retrieve our table contents for all records
             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                 
                // extract row
                extract($row);
                    
                $results[$i][0] = $id;
                $results[$i][1] = $name;
                $results[$i][2] = $description;
                $results[$i][3] = $alarm_date;
                $results[$i][4] = $alarm_time;
                $results[$i][5] = $repeated;
                
                $i++;
                
            }
         
         $_SESSION['reminders_table'] = $results;
         
        }
        
        $_SESSION['reminders_rows_num'] = $num;
    }
    
    header('location: http://aalproject.000webhostapp.com/aal/simple_users/reminders.php');
    
?>