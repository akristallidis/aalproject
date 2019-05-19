<?php
    
    session_start();
 
    // include database and reminders files
    include_once '../config/database.php';
    include_once '../objects/reminders.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize reminders object
    $reminders = new reminders($db);

    // check for no empty parameter
    if(!empty($_SESSION['delete_reminder'])) {
 
        // set reminders property values
        $reminders->id = $_SESSION['delete_reminder'];
    
        if($reminders->delete($reminders)){
 
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/reminders/read.php';
                alert('Η υπενθύμιση διαγράφηκε επιτυχώς!');
            </script>";
            
        }
        else{
 
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/reminders/read.php';
                alert('Πρόβλημα στην διαγραφή της υπενθύμισης');
            </script>";
        }
    }
    else {
 
        echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/reminders/read.php';
                alert('Πρόβλημα στην διαγραφή της υπενθύμισης');
            </script>";
    }
?>