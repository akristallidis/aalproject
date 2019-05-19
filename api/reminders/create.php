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
 
    // include database and reminders files
    include_once '../config/database.php';
    include_once '../objects/reminders.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize reminders
    $reminders = new reminders($db);

    // check for no empties paramaters
    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['alarm_date']) && !empty($_POST['alarm_time']) && !empty($_POST['repeated'])) {
 
        // set reminders property values
        $reminders->name = $_POST['name'];
        $reminders->description = $_POST['description'];
        $reminders->alarm_date = $_POST['alarm_date'];
        $reminders->alarm_time = $_POST['alarm_time'];
        $reminders->repeated = $_POST['repeated'];
        $reminders->user_id = $_SESSION['user_id'];
 
        if($reminders->create($reminders)){
 
            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/reminders/read.php';
                alert('Η εγγραφή προστέθηκε επιτυχώς!');
            </script>";
            
        }
        
        else {

            echo "<script type='text/javascript'>
                window.location='http://aalproject.000webhostapp.com/aal/api/reminders/read.php';
                alert('Πρόβλημα στην εγγραφή.\\nΠαρακαλώ προσπαθήστε πάλι.!');
            </script>";
            
        }
    }
    else {
        
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/simple_users/new_reminder.php';
            alert('Όλα τα πεδία πρέπει να συμπληρωθούν.');
        </script>";
        
    }
?>