<?php
    
    session_start();
 
    // include database and reminders files
    include_once '../config/database.php';
    include_once '../objects/reminders.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize reminders object
    $reminders = new reminders($db);
    
    // check for no empty parameter
    if(isset($_POST['selected_id'])) {

        // set reminders property values
        $reminders->id = $_POST['selected_id'];
    
        $stmt = $reminders->read_one($reminders);
        $num = $stmt->rowCount();
        
        // check if 1 record found
        if($num==1) {
            
            $results[0] = array();
        
            // retrieve our table contents
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
                 
            // extract row
            extract($row);
                
            $results[0] = $id;
            $results[1] = $name;
            $results[2] = $description;
            $results[3] = $alarm_date;
            $results[4] = $alarm_time;
            $results[5] = $repeated;
            $results[6] = $user_id;
            
            $_SESSION['reminder_for_update'] = $results;
        }
        
    }
    
    header('location: http://aalproject.000webhostapp.com/aal/simple_users/edit_reminder.php');
    
?>