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
    
    // check for no empty parameter
    if(!empty($_SESSION['delete_subscription'])) {
 
        // set activities property values
        $subscription->id = $_SESSION['delete_subscription'];
    
        if($subscription->delete($subscription)){
            
            header('location:http://aalproject.000webhostapp.com/aal/api/subscription/read.php');

        }
        else{
 
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/subscription/create.php';
                alert('Πρόβλημα στην Διαγραφή.\\nΠαρακαλώ προσπαθήστε πάλι.!');
            </script>";
            
        }
        
    }
    
    else {
 
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/social_users/home.php';
            alert('Δεν έχετε επιλέξει εγγραφή για διαγραφή.');
        </script>";
        
    }
    
?>