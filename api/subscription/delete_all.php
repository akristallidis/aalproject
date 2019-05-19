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
    include_once '../objects/subscription.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize activities object
    $subscription = new subscription($db);
 
    // set activities property values
    $subscription->user_id = $_SESSION['user_id'];
    
    if($subscription->delete_all($subscription)){
        
        header('location:http://aalproject.000webhostapp.com/aal/api/users/delete.php');

    }
    
    else {
        
        header('location:http://aalproject.000webhostapp.com/aal/social_users/home.php');
        
    }
    
?>