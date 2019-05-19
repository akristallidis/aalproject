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
    
    if($_POST['action'] == "Διαγραφή") {
        
        if (isset($_POST['selection'])) {
            
            foreach($_POST['selection'] as $sel){
                if (!empty($sel)) {
                    $_SESSION['delete_subscription'] = $sel;
                    header('location:http://aalproject.000webhostapp.com/aal/api/subscription/delete.php');
                }
            }
        }
        
    }

?>