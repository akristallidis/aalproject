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
 
    // initialize reminders object
    $reminders = new reminders($db);
 
    // set activities property values
    $reminders->user_id = $_SESSION['user_id'];
    
    if($reminders->delete_all($reminders)){
        
        header('location:http://aalproject.000webhostapp.com/aal/api/users/delete.php');

    }
    
    else {
        
        header('location:http://aalproject.000webhostapp.com/aal/simple_users/menu.php');
        
    }
    
?>