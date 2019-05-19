<!DOCTYPE html>
<html lang="en" >
    
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1>
        <title>AAL Social Services</title>
        <link rel="shortcut icon" href="http://aalproject.000webhostapp.com/aal/assets/img/social_icon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  
    </head>

    <body>
	    
	    <?php
	    
	        echo "<div class=\"w3-top w3-theme\">";
            
                echo "<div class=\"w3-container w3-card w3-margin-center\">";
                    echo "<h1><center>AAL Project</center></h1>";
                echo "</div>";
                
                echo "<div class=\"w3-display-topleft\">";
                    echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/sign_up.php'\" name=\"action\" value=\"⇦\" /></td></p>";
                echo "</div>";
                
            echo "</div>";
            
	        
	        echo "<div class=\"w3-display-middle w3-container\">";
	        
	            echo "<form class=\"sign-up-htm\" action=\"http://aalproject.000webhostapp.com/aal/api/users/sign_up.php\" method=\"POST\">";
		
					echo "<input id=\"id_signup_social\" name=\"id_signup\" type=\"text\" class=\"w3-input\" placeholder=\"Όνομα χρήστη\">";
        				
					echo "<input id=\"firstname_social\" name=\"firstname\" type=\"text\" class=\"w3-input\" placeholder=\"Όνομα κοινωνικής υπηρεσίας\">";
        				
				    echo "<input type=\"hidden\" id=\"lastname_social\" name=\"lastname\" value=\"Δεν έχει προστεθεί περιγραφή.\">";
        				
				    echo "<input type=\"hidden\" id=\"birthdate_social\" name=\"birthdate\" value=\"1990-01-01\">";
        				
					echo "<input id=\"town_social\" name=\"town\" type=\"text\" class=\"w3-input\" placeholder=\"Πόλη\">";
    				
    				echo "<input id=\"address_social\" name=\"address\" type=\"text\" class=\"w3-input\" placeholder=\"Διεύθυνση\">";
        					
    			    echo "<input type=\"text\" id=\"phone_social\" name=\"phone\" class=\"w3-input\" placeholder=\"Τηλέφωνο\">";
    			
    				echo "<input id=\"password_signup_social\" name=\"password_signup\" type=\"password\" class=\"w3-input\" data-type=\"password\" placeholder=\"Κωδικός πρόσβασης\">";
    						
    				echo "<input id=\"password_confirm_social\" name=\"password_confirm\" type=\"password\" class=\"w3-input\" data-type=\"password\" placeholder=\"Επιβεβαίωση κωδικού\">";
    						
    			    echo "<input type=\"hidden\" id=\"user_type_social\" name=\"user_type\" value=\"social\">";
        				
    				echo "<input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Εγγραφή\" onclick=\"return check_sign_up_social()\"></p>";
        		
        	    echo "</form>";
        	    
        	echo "</div>";
        	
        	
        	echo "<footer class=\"w3-bottom w3-container w3-theme\">";
            
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
    	        
            echo "</footer>";
	    
	   	?>
    	
    	<script type="text/javascript">
    	    
    	    function check_sign_up_social() {
    	        var username = document.getElementById("id_signup_social").value;
    	        var firstname = document.getElementById("firstname_social").value;
    	        var town = document.getElementById("town_social").value;
    	        var address = document.getElementById("address_social").value;
    	        var phone = document.getElementById("phone_social").value;
    	        var psw1 = document.getElementById("password_signup_social").value;
    	        var psw2 = document.getElementById("password_confirm_social").value;
    	        if (username && firstname && town && address && phone && psw1 && psw2) {
    	            if (psw1==psw2) {
    	                return true;
    	            }
    	            else {
    	                document.getElementById("password_signup_social").style.backgroundColor = "#FF9797";
    	                document.getElementById("password_confirm_social").style.backgroundColor = "#FF9797";
    	                alert('Οι κωδικοί δεν συμπίπτουν.');
    	                return false;
    	            }
    	        }
    	        else {
                    document.getElementById("id_signup_social").style.backgroundColor = "#FF9797";
                    document.getElementById("firstname_social").style.backgroundColor = "#FF9797";
                    document.getElementById("town_social").style.backgroundColor = "#FF9797";
                    document.getElementById("address_social").style.backgroundColor = "#FF9797";
                    document.getElementById("phone_social").style.backgroundColor = "#FF9797";
                    document.getElementById("password_signup_social").style.backgroundColor = "#FF9797";
                    document.getElementById("password_confirm_social").style.backgroundColor = "#FF9797";
    	            alert('Όλα τα πεδία πρέπει να συμπληρωθούν');
    	            return false;
    	        }
    	    }
    	    
    	    </script>
        
    </body>

</html>