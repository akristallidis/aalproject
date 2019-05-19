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
    if(!empty($_SESSION['user_id'])) {
        
        // set users property values
        $users->id = $_SESSION['user_id'];

        $stmt = $users->read($users);
        $num = $stmt->rowCount();
 
        // check if 1 record found
        if($num==1){
 
            // retrieve our table contents
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
 
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['birthdate'] = $birthdate;
            $_SESSION['town'] = $town;
            $_SESSION['address'] = $address;
            $_SESSION['phone'] = $phone;
            $_SESSION['password'] = $password;
            
            header('location:http://aalproject.000webhostapp.com/aal/users/secure_login.php');
        }

    }
    else {
        
        header('location:http://aalproject.000webhostapp.com/aal/index.php');
        
    }
    
?>