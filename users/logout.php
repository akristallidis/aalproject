<?php

    session_start();
    
    if (!isset($_SESSION['valid'])) {
        
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/index.php';
            alert('Δεν έχετε συνδεθεί.');
        </script>";
        
    }
    
    session_unset();
    unset($_COOKIE['id_login']);
    unset($_COOKIE['password_login']);
    setcookie('id_login', null, -1, '/');
    setcookie('password_login', null, -1, '/');
	//echo "Cookies Not Set";
    
    header('location: http://aalproject.000webhostapp.com/aal/index.php');
    
?>