<?php
    
    session_start();
 
    // include database and subscription files
    include_once '../config/database.php';
    include_once '../objects/subscription.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize subscription object
    $subscription = new subscription($db);

    // check for no empty parameter
    if(isset($_POST['selected_id'])) {

        // set subscription property values
        $subscription->id = $_POST['selection'];
    
        $stmt = $subscription->read_one($subscription);
        $num = $stmt->rowCount();
        
        // check if 1 record found
        if($num==1) {
            
            $results[0] = array();
            
            // retrieve our table contents
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        
            // subscription array
            $results[0] = $id;
            $results[1] = $title;
            $results[2] = $description;
            $results[3] = $event_date;
            $results[4] = $event_time;
            $results[5] = $user_id;
            
            $_SESSION['subscription_for_update'] = $results;
            
        }
        
    }
    
    header('location: http://aalproject.000webhostapp.com/aal/social_users/edit_subscription.php');
    
?>