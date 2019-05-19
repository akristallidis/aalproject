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
        
    $stmt = $subscription->read_all($subscription);
    $num = $stmt->rowCount();
 
    // check if more than 0 record found
    if($num>0){
            
        $rslts = array();
        $results[0] = array();
        $results[1] = array();
            
        $i = 0;
            
        // retrieve our table contents for all records
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                 
            // extract row
            extract($row);
                    
            $results[$i][0] = $id;
            $results[$i][1] = $title;
            $results[$i][2] = $description;
            $results[$i][3] = $event_date;
            $results[$i][4] = $event_time;
            $results[$i][5] = $user_id;
            
            $i++;
                
        }
         
        $_SESSION['all_subscriptions_table'] = $results;
         
    }
        
    $_SESSION['all_subscriptions_rows_num'] = $num;
    
    header('location: http://aalproject.000webhostapp.com/aal/simple_users/social_services_list.php');
    
?>