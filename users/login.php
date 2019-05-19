<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1>
        <link rel="shortcut icon" href="http://aalproject.000webhostapp.com/aal/assets/img/social_icon.ico" type="image/x-icon">
        <title>AAL Social Services</title>
        
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  
    </head>

    <body>
        
        <?php
        
            if (!empty($_COOKIE['id_login'])) {
    		    $a = $_COOKIE['id_login'];
    		    $b = $_COOKIE['password_login'];
    		}
    		else {
    		    $a = "";
    		    $b = "";
    		}
        
            echo "<div class=\"w3-top w3-theme\">";
            
                echo "<div class=\"w3-container w3-card w3-margin-center\">";
                
                    echo "<h1><center>AAL Project</center></h1>";
                    
                echo "</div>";
                
                echo "<div class=\"w3-display-topleft\">";
                
                    echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/index.php'\" name=\"action\" value=\"⇦\" /></td></p>";
                    
                echo "</div>";
                
	        echo "</div>";
	    
    		
	    	echo "<form id=\"sign-in-htm\" class=\"w3-container\" action=\"http://aalproject.000webhostapp.com/aal/api/users/login.php\" method=\"POST\">";
	    	
	        	echo "<div class=\"w3-display-middle w3-container\">";
	    	
    		        echo "<label>Όνομα χρήστη</label>";
			    	echo "<input id=\"id_login\" name=\"id_login\" type=\"text\" class=\"w3-input\" value=\"$a\"></p>";
    				
    				echo "<label>Κωδικός πρόσβασης</label>";
					echo "<input id=\"password_login\" name=\"password_login\" type=\"password\" class=\"w3-input\" data-type=\"password\" value=\"$b\"></p>";
    	    				
					echo "<input id=\"check\" type=\"checkbox\" class=\"w3-check\" name=\"check\" checked>";
					echo "<label for=\"check\"><span class=\"icon\"></span> Διατήρηση στοιχείων σύνδεσης</label></p>";
    				
				    echo "<input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Σύνδεση\" onclick=\"return check_login()\">";
				    
		    	echo "</div>";
    				
			echo "</form>";
			
			echo "<footer class=\"w3-bottom w3-container w3-theme\">";
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
            echo "</footer>";
    
        ?>
        
    <script type="text/javascript">
    	    
    	    function check_login() {
    	        var usr = document.getElementById("id_login").value;
    	        var psw = document.getElementById("password_login").value;
                if (usr && psw) {
                    return true;
    	        }
                else {
                    document.getElementById("id_login").style.backgroundColor = "#FF9797";
                    document.getElementById("password_login").style.backgroundColor = "#FF9797";
                    alert('Όλα τα πεδία πρέπει να συμπληρωθούν');
    	            return false;
    	        }
    	    }
    </script>
    
    </body>

</html>