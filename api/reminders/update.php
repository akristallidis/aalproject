<?php
    
    session_start();
 
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/reminders.php';
 
    // instantiate database and reminders files
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize reminders
    $reminders = new reminders($db);
    
    // check for no empties parameters
    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['alarm_date']) && !empty($_POST['alarm_time']) && !empty($_POST['repeated'])) {
 
        // set reminders property values
		$reminders->id = $_SESSION['reminder_for_update'][0];
        $reminders->name = $_POST['name'];
        $reminders->description = $_POST['description'];
        $reminders->alarm_date = $_POST['alarm_date'];
        $reminders->alarm_time = $_POST['alarm_time'];
        $reminders->repeated = $_POST['repeated'];
    
        if($reminders->update($reminders)){
 
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/reminders/read.php';
                alert('Η υπενθύμιση ενημερώθηκε επιτυχώς!');
            </script>";
            
        }
        
        else {
            
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/simple_users/reminders.php';
                alert('Πρόβλημα ενημέρωσης');
            </script>";
            
        }
        
    }
    
    else {
        
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/simple_users/edit_reminder.php';
            alert('Όλα τα πεδία πρέπει να συμπληρωθούν');
        </script>";
        
    }
    
?>