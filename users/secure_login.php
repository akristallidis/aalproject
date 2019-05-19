<?php

    session_start();
    
    if ($_SESSION['valid'] == false) {

        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/users/login.php';
            alert('Λάθος όνομα χρήστη και/ή κωδικός πρόσβασης.\\nΠαρακαλώ προσπαθήστε πάλι.');
        </script>";
        session_destroy();
        
    }
    
    else if ($_SESSION['user_type'] == "normal") {
       
        header('location:http://aalproject.000webhostapp.com/aal/simple_users/menu.php');
       
    }
   
    else {
       
        header('location:http://aalproject.000webhostapp.com/aal/api/subscription/read.php');
       
    }
   
?>