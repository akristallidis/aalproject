<?php

    session_start();
 
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/users.php';
 
    // instantiate database and activities object
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize object
    $users = new users($db);
	
    // check for no empties parameters
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['birthdate']) && !empty($_POST['town']) && !empty($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['user_type'])) {

        // set product property values
        $users->id = $_SESSION['user_id'];
        $users->firstname = $_POST['firstname'];
        $users->lastname = $_POST['lastname'];
        $users->birthdate = $_POST['birthdate'];
        $users->town = $_POST['town'];
        $users->address = $_POST['address'];
        $users->phone = $_POST['phone'];
        $users->user_type = $_POST['user_type'];
    
        
        if(preg_match('/[Α-Ωα-ω][Α-Ωα-ω\s]+$/', $users->town) && preg_match('/[Α-Ωα-ω0-9][Α-Ωα-ω0-9\s]+$/', $users->address) && $users->user_type=="normal") {
            
            if($users->update_data($users)) {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/api/users/read.php';
                    alert('Ο λογαριασμός χρήστη ενημερώθηκε επιτυχώς!');
                </script>";
                
            }
            
        }
        
        else if(preg_match('/[Α-Ωα-ω][Α-Ωα-ω\s]+$/', $users->town) && preg_match('/[Α-Ωα-ω0-9][Α-Ωα-ω0-9\s]+$/', $users->address) && preg_match('/[0-9]{10}$/', $users->phone) && $users->user_type=="social") {
            
            if($users->update_data($users)) {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/api/users/read.php';
                    alert('Ο λογαριασμός χρήστη ενημερώθηκε επιτυχώς!');
                </script>";
                
            }
            
        }
        
        else {
            
            if($users->user_type=="normal") {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/edit_normal_profile.php';
                    alert('Πρόβλημα ενημέρωσης\\nΗ πόλη και η διεύθνση πρέπει να είναι στα ελληνικά.');
                </script>";
                
            }
            
            else if($users->user_type=="social") {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/edit_social_profile.php';
                    alert('Πρόβλημα ενημέρωσης\\nΗ πόλη και η διεύθνση πρέπει να είναι στα ελληνικά.\\nΤο τηλέφωνο πρέπει να αποτελείται από 10 ψηφία.');
                </script>";
                
            }
            
            else {
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/edit_normal_profile.php';
                    alert('Γιατί?');
                </script>";
                
            }
            
        }
    }
?>