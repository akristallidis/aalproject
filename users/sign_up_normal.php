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
            			
    				echo "<input id=\"id_signup_normal\" name=\"id_signup\" type=\"text\" class=\"w3-input\" placeholder=\"ID (κινητό τηλέφωνο)\">";
        				
    				echo "<input id=\"firstname_normal\" name=\"firstname\" type=\"text\" class=\"w3-input\" placeholder=\"Όνομα\">";
		
    			    echo "<input type=\"text\" id=\"lastname_normal\" name=\"lastname\" class=\"w3-input\" placeholder=\"Επώνυμο\">";
				
    			    echo "<input type=\"date\" id=\"birthdate_normal\" name=\"birthdate\" class=\"w3-input\" placeholder=\"Ηλικία\">";
        				
    				echo "<input id=\"town_normal\" name=\"town\" type=\"text\" class=\"w3-input\" placeholder=\"Πόλη\">";
			
    				echo "<input id=\"address_normal\" name=\"address\" type=\"text\" class=\"w3-input\" placeholder=\"Διεύθυνση\">";
        				
    				echo "<input id=\"password_signup_normal\" name=\"password_signup\" type=\"password\" class=\"w3-input\" data-type=\"password\" placeholder=\"Κωδικός πρόσβασης\">";
    						
    				echo "<input id=\"password_confirm_normal\" name=\"password_confirm\" type=\"password\" class=\"w3-input\" data-type=\"password\" placeholder=\"Επιβεβαίωση κωδικού\">";
    						
    			    echo "<input type=\"hidden\" id=\"user_type_normal\" name=\"user_type\" value=\"normal\">";
					
        		    echo "<input type=\"hidden\" id=\"phone_normal\" name=\"phone\" value=\"0000000000\">";
    				
        			echo "<input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\"\" value=\"Εγγραφή\" onclick=\"return check_sign_up_normal()\"></p>";
        		
            	echo "</form>";
        	
        	echo "</div>";
        	
        	
        	echo "<footer class=\"w3-bottom w3-container w3-theme\">";
            
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
    	        
            echo "</footer>";
			
			?>
			
			<script type="text/javascript">
			function check_sign_up_normal() {
    	        var username = document.getElementById("id_signup_normal").value;
    	        var firstname = document.getElementById("firstname_normal").value;
    	        var lastname = document.getElementById("lastname_normal").value;
    	        var birthdate = document.getElementById("birthdate_normal").value;
    	        var town = document.getElementById("town_normal").value;
    	        var address = document.getElementById("address_normal").value;
    	        var psw1 = document.getElementById("password_signup_normal").value;
    	        var psw2 = document.getElementById("password_confirm_normal").value;
    	        if (username && firstname && lastname && birthdate && town && address && psw1 && psw2) {
    	            if (psw1==psw2) {
    	                return true;
    	            }
    	            else {
    	                document.getElementById("password_signup_normal").style.backgroundColor = "#FF9797";
    	                document.getElementById("password_confirm_normal").style.backgroundColor = "#FF9797";
    	                alert('Οι κωδικοί δεν συμπίπτουν.');
    	                return false;
    	            }
    	        }
    	        else {
                    document.getElementById("id_signup_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("firstname_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("lastname_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("birthdate_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("town_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("address_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("password_signup_normal").style.backgroundColor = "#FF9797";
                    document.getElementById("password_confirm_normal").style.backgroundColor = "#FF9797";
    	            alert('Όλα τα πεδία πρέπει να συμπληρωθούν');
    	            return false;
    	        }
    	    }
    	
        </script>
        
    </body>

</html>