<?php

    session_start();
    
    // include database and users files
    include_once '../config/database.php';
    include_once '../objects/users.php';
 
    // instantiate database
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize users
    $users = new users($db);
	
    $_SESSION['valid'] = false;
	$_SESSION['user_type'] = "unknown";
	
    // check for no empties parameters
    if(!empty($_POST['id_login']) && !empty($_POST['password_login'])) {
		
        // set users property values
        $users->id = $_POST['id_login'];
        $users->password = $_POST['password_login'];
		
		$stmt = $users->login($users);
        $num = $stmt->rowCount();
		
        if($num==1){
            
            $stmt = $users->return_user_type($users);
            
            // retrieve our table contents
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            
            if ($user_type=="social"){
                
                $_SESSION['valid'] = true;
                $_SESSION['user_id'] = $users->id;
                $_SESSION['user_type'] = "social";
                
            }
            
            else if ($user_type=="normal"){
                
                $_SESSION['valid'] = true;
                $_SESSION['user_id'] = $users->id;
                $_SESSION['user_type'] = "normal";
                
            }
            
            if(!empty($_POST["check"])) {
                
        	    setcookie("id_login",$_POST['id_login'],time()+12*60*60,"/");
                setcookie("password_login",$_POST['password_login'],time()+12*60*60,"/");
            	//echo "Cookies Set Successfuly";
            	
            }
            
            else {
                unset($_COOKIE['id_login']);
                unset($_COOKIE['password_login']);
                setcookie('id_login', null, -1, '/');
                setcookie('password_login', null, -1, '/');
	            //echo "Cookies Not Set";
	            
            }
            
        }
        
    }
    
    if ($_SESSION['valid'] == true) {
        
        header('location:http://aalproject.000webhostapp.com/aal/api/reminders/read_for_notifications.php');
        
    }
    
    else {
        header('location:http://aalproject.000webhostapp.com/aal/users/secure_login.php');
        //echo "<script type='text/javascript'>
            //window.location='http://aalproject.000webhostapp.com/aal/users/login.php';
            //alert('Λάθος όνομα και/ή κωδικός πρόσβασης.\\nΠαρακαλώ προσπαθείστε πάλι.');
        //</script>";
    }
    
?>