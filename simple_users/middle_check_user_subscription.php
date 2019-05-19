<?php

    session_start();
    
    if (!isset($_SESSION['valid'])) {
        
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/index.php';
            alert('Δεν έχετε συνδεθεί.');
        </script>";
        session_destroy();
        exit();
        
    }
    
    $_SESSION['selected_social_user']=trim($_POST['sel']);
    $social_users_rows = $_SESSION['all_subscriptions_users_num']; //Dynamic number for Rows
            
    for($i=0;$i<$social_users_rows;$i++) {
        if($_SESSION['selected_social_user']==$_SESSION['all_subscriptions_users'][$i][1]) {
            $_SESSION['selected_social_user_id'] = $_SESSION['all_subscriptions_users'][$i][0];
        }
    }
    header('location: http://aalproject.000webhostapp.com/aal/api/subscription/read_for_normal.php');
?>