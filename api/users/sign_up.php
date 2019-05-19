<?php
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/users.php';

    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize users
    $users = new users($db);
	
    // check for no empties parameters
    if(!empty($_POST['id_signup']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['birthdate']) && !empty($_POST['town']) && !empty($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['password_signup']) && !empty($_POST['user_type'])) {
 
        // set users property values
        $users->id = $_POST['id_signup'];
        $users->firstname = $_POST['firstname'];
        $users->lastname = $_POST['lastname'];
        $users->birthdate = $_POST['birthdate'];
		$users->town = $_POST['town'];
		$users->address = $_POST['address'];
		$users->phone = $_POST['phone'];
		$users->password = $_POST['password_signup'];
		$users->user_type = $_POST['user_type'];
        
        
        if(preg_match('/^69[0-9]{8}$/', $users->id) && preg_match('/[A-Za-z][A-Za-z0-9]{5,10}$/', $users->password) && preg_match('/[Α-Ωα-ω][Α-Ωα-ω\s]+$/', $users->town) && preg_match('/[Α-Ωα-ω0-9][Α-Ωα-ω0-9\s]+$/', $users->address) && $users->user_type=="normal") {
            
            if($users->sign_up($users)){
 
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/index.php';
                    alert('Ο λογαριασμός χρήστη δημιουργήθηκε επιτυχώς!');
                </script>";
                
            }
 
            // if unable to create the user, tell the user
            else {
    
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/index.php';
                    alert('Το όνομα χρήστη που επιλέξατε χρησιμοποιείται ήδη.');
                </script>";
                
            }
            
        }
        
        else if(preg_match('/[A-Za-z][A-Za-z0-9]{4,10}$/', $users->id) && preg_match('/[A-Za-z][A-Za-z0-9]{4,10}$/', $users->password) && preg_match('/[Α-Ωα-ω][Α-Ωα-ω\s]+$/', $users->town) && preg_match('/[Α-Ωα-ω0-9][Α-Ωα-ω0-9\s]+$/', $users->address) && preg_match('/[0-9]{10}$/', $users->phone) && $users->user_type=="social") {
            
            if($users->sign_up($users)) {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/index.php';
                    alert('Ο λογαριασμός χρήστη δημιουργήθηκε επιτυχώς!');
                </script>";
                
            }
 
            // if unable to create the user, tell the user
            else {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/index.php';
                    alert('Το όνομα χρήστη που επιλέξατε χρησιμοποιείται ήδη.');
                </script>";
                
            }
            
        }
        
        else {
            
            if($users->user_type=="normal") {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/sign_up_normal.php';
                    alert('Πρόβλημα εγγραφής\\nΤο id χρήστη πρέπει να είναι το νούμερο τηλεφώνου.\\nΟ κωδικός πρέπει να έχει από 5 εως 10 χαρακτήρες αποτελούμενοι από:\\nA-Z και/ή\\na-z και/ή\\n0-9\\nκαι να αρχίζει από γράμμα.\\nΗ πόλη και η διεύθνση πρέπει να είναι στα ελληνικά.');
                </script>";
                
            }
            
            else if($users->user_type=="social") {
                
                echo "<script type='text/javascript'>
                    window.location='http://aalproject.000webhostapp.com/aal/users/sign_up_social.php';
                    alert('Πρόβλημα εγγραφής\\nΤο όνομα χρήστη και ο κωδικός πρέπει να αποτελούνται από 5 εως 10 χαρακτήρες αποτελούμενοι από:\\nA-Z και/ή\\na-z και/ή\\n0-9\\nκαι να ξεκινούν από γράμμα.\\nΗ πόλη και η διεύθνση πρέπει να είναι στα ελληνικά.\\nΤο τηλέφωνο πρέπει να αποτελείται από 10 ψηφία.');
                </script>";
                
            }
            
            else {
                
                session_destroy();
                exit();
                
            }
            
        }
        
    }
    
?>