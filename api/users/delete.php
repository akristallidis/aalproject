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
 
    // set users property values
    $users->id = $_SESSION['user_id'];
    
    if($users->delete($users)){
    
        header('location:http://aalproject.000webhostapp.com/aal/index.php');
        
    }
    
    else {
    
        header('location:http://aalproject.000webhostapp.com/aal/index.php');
    }
    
?>