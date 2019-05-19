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
    
    $_SESSION['selected_normal_user']=trim($_POST['select']);
    $normal_users_rows = $_SESSION['all_reminders_users_num'];
    echo $_SESSION['selected_normal_user'];
    
    for($i=0;$i<$normal_users_rows;$i++) {
        if($_SESSION['selected_normal_user']==$_SESSION['all_reminders_users'][$i][1]) {
            $_SESSION['selected_normal_user_id'] = $_SESSION['all_reminders_users'][$i][0];
        }
    }
    
    //header('location: http://aalproject.000webhostapp.com/aal/api/reminders/read_for_normal.php');
?>