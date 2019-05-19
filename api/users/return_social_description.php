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

    // check for no empty parameter
    if(!empty($_SESSION['selected_social_user_id'])) {
        
        // set users property values
        $users->id = $_SESSION['selected_social_user_id'];

        $stmt = $users->return_social_description($users);
        $num = $stmt->rowCount();
 
        // check if 1 record found
        if($num==1){
 
            // retrieve our table contents
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
 
            $_SESSION['description'] = $lastname;
            
            header('location:http://aalproject.000webhostapp.com/aal/simple_users/social_service_description.php');
        }

    }
    
?>