<?php

    session_start();
    
    if (!isset($_SESSION['valid'])) {
        
        echo "<script type='text/javascript'>
            window.location='http://aalproject.000webhostapp.com/aal/index.php';
            alert('Δεν έχετε συνδεθεί.');
        </script>";
        session_destroy();
        exit();
        
    }
?>
    
<!DOCTYPE html>
<html lang="en" >
    
    <head>
        
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1>
        <link rel="shortcut icon" href="http://aalproject.000webhostapp.com/aal/assets/img/social_icon.ico" type="image/x-icon">
        <title>AAL Social Services</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  
    </head>

    <body>
        
        <?php
        
        $frst = $_SESSION['firstname'];
        $lst = $_SESSION['lastname'];
        $twn = $_SESSION['town'];
        $adr = $_SESSION['address'];
        $phn = $_SESSION['phone'];
        
        
            echo "<div class=\"w3-top w3-theme\">";
            
                echo "<div class=\"w3-container w3-card w3-margin-center\">";
                    echo "<h1><center>" . $_SESSION['firstname'] . "</center></h1>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topleft\">";
                    echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/edit_social_profile.php'\" name=\"action\" value=\"⇦\" /></td></p>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topright\">";
                    echo "<td><input type=\"button\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"⟰\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aaal/social_users/home.php\" /></td></p>";
                echo "</div>";
            
            echo "</div>";
            
            
            echo "<div class=\"w3-display-middle w3-container\">";
			 
			    echo "<form id=\"edit-data-html\" class=\"edit-data-html\" action=\"http://aalproject.000webhostapp.com/aal/api/users/update_data.php\" method=\"POST\">";
        
            		echo "<input id=\"firstname\" name=\"firstname\" type=\"text\" class=\"w3-input\" placeholder=\"Νέο όνομα υπηρεσίας\" value=\"$frst\">";
            	
        		    echo "<textarea type=\"text\" id=\"lastname\" name=\"lastname\" rows=\"5\" cols=\"20\" wrap=\"soft\" style=\"width:400px; class=\"w3-input\" placeholder=\"Περιγραφή\">$lst</textarea>";
        		
        		    echo "<input type=\"hidden\" id=\"birthdate\" name=\"birthdate\" value=\"1990-01-01\">";
    	
            		echo "<input id=\"town\" name=\"town\" type=\"text\" class=\"w3-input\" placeholder=\"Πόλη\" value=\"$twn\">";
    	
            		echo "<input id=\"address\" name=\"address\" type=\"text\" class=\"w3-input\" placeholder=\"Διεύθυνση\" value=\"$adr\">";
            	
            		echo "<input id=\"phone\" name=\"phone\" type=\"text\" class=\"w3-input\" placeholder=\"Τηλέρωνο\" value=\"$phn\">";
            	
        		    echo "<input type=\"hidden\" id=\"user_type\" name=\"user_type\" value=\"social\">";
            	
            	    echo "<input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Ενημέρωση προσωπικών στοιχείων\" onclick=\"return edit_data()\"></p>";
    	        
    	        echo "</form>";
    	    
    	    echo "</div>";
    	    
    	    echo "<footer class=\"w3-bottom w3-container w3-theme\">";
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
            echo "</footer>";
    	    
    	    ?>
    	    
    	    <script type="text/javascript">
    	    
            function edit_data() {
                var firstname = document.getElementById("firstname").value;
                var lastname = document.getElementById("lastname").value;
                var town = document.getElementById("town").value;
                var address = document.getElementById("address").value;
                var phone = document.getElementById("phone").value;
                if (firstname && lastname && town && address && phone) {
                    return true;
                }    
                else {
                    document.getElementById("firstname").style.backgroundColor = "#FF9797";
                    document.getElementById("lastname").style.backgroundColor = "#FF9797";
                    document.getElementById("town").style.backgroundColor = "#FF9797";
                    document.getElementById("address").style.backgroundColor = "#FF9797";
                    document.getElementById("phone").style.backgroundColor = "#FF9797";
                    alert('Όλα τα πεδία πρέπει να συμπληρωθούν.');
                    return false;
                }
            }
            
            </script>
        
    </body>

</html>