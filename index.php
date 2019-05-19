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
            
            $today_time = date("H:i:s");
            $today_date = date("Y-m-d");
        
	        echo "<div class=\"w3-top w3-theme\">";
            
                echo "<div class=\"w3-container w3-card w3-margin-center\">";
                
                    echo "<h1><center>AAL Project</center></h1>";
                    
                echo "</div>";
                
            echo "</div>";
        
	    
            echo "<form method=\"POST\">";
                
                echo "<div class=\"w3-display-middle w3-container\">";
                
                    echo "<input type=\"submit\" formaction=\"http://aalproject.000webhostapp.com/aal/users/login.php\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" style=\"width:100%\" value=\"Σύνδεση\"></p>";
    	    				
                    echo "<input type=\"submit\" formaction=\"http://aalproject.000webhostapp.com/aal/users/sign_up.php\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" style=\"width:100%\" value=\"Εγγραφή\"></p>";
                    
                echo "</div>";
    				
            echo "</form>";
            
            
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
            
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
    	        
            echo "</footer>";
        	
    	?>
    	
    </body>

</html>