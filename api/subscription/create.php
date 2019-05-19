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
 
    // initialize activities
    $subscription = new subscription($db);

    // check for no empties paramaters
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['event_date']) && !empty($_POST['event_time'])) {
 
        // set activities property values
        $subscription->title = $_POST['title'];
        $subscription->description = $_POST['description'];
        $subscription->event_date = $_POST['event_date'];
        $subscription->event_time = $_POST['event_time'];
        $subscription->user_id = $_SESSION['user_id'];
        
        if($subscription->create($subscription)){
 
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/subscription/read.php';
                alert('Η εγγραφή προστέθηκε επιτυχώς!');
            </script>";
            
        }
        
        else {

            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/subscription/create.php';
                alert('Πρόβλημα στην εγγραφή.\\nΠαρακαλώ προσπαθήστε πάλι.!');
            </script>";
            
        }
        
    }
    else {
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/social_users/new_subscription.php';
            alert('Όλα τα πεδία πρέπει να συμπληρωθούν.');
        </script>";
    }
    
?>