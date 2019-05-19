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
    if(!empty($_POST['password_new'])) {
 
        // set product property values
        $users->password = $_POST['password_new'];
        $users->id = $_SESSION['user_id'];
        
        if($_SESSION['user_type'] == "social"){
            if(preg_match('/[A-Za-z][A-Za-z0-9]{5,10}$/', $users->password)){
                if($users->update_password($users)){
     
                    echo "<script type='text/javascript'>
                        window.location='http://aalproject.000webhostapp.com/aal/social_users/home.php';
                        alert('Ο κωδικός χρήστη ενημερώθηκε επιτυχώς!');
                    </script>";
                }
            }
            
            else {
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/edit_social_profile.php';
                    alert('Ο κωδικός χρήστη δεν ενημερώθηκε.\\nΟ κωδικός πρέπει να αποτελείται από 5 εως 10 χαρακτήρες και μπορεί να αποτελείται από\\nA-Z και/ή\\na-z και/ή\\n0-9\\nκαι να ξεκινάει από γράμμα.');
                </script>";
            }
        }
        else {
            if(preg_match('/[A-Za-z][A-Za-z0-9]{5,10}$/', $users->password)){
                if($users->update_password($users)){
     
                    echo "<script type='text/javascript'>
                        window.location='http://aalproject.000webhostapp.com/aal/simple_users/menu.php';
                        alert('Ο κωδικός χρήστη ενημερώθηκε επιτυχώς!');
                    </script>";
                }
            }
            else {
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/edit_normal_profile.php';
                    alert('Ο κωδικός χρήστη δεν ενημερώθηκε.\\nΟ κωδικός πρέπει να αποτελείται από 5 εως 10 χαρακτήρες και μπορεί να αποτελείται από\\nA-Z και/ή\\na-z και/ή\\n0-9\\nκαι να ξεκινάει από γράμμα.');
                </script>";
            }
        }
    }
?>