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
                    echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/index.php'\" name=\"action\" value=\"⇦\" /></td></p>";
                echo "</div>";
                
            echo "</div>";
            
            
            echo "<div class=\"w3-display-middle w3-container\">";
            
                echo "<td><input type=\"button\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Εγγραφή ως χρήστης\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/sign_up_normal.php'\" /></td></p>";
            
                echo "<td><input type=\"button\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Εγγραφή ως υπηρεσία\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/sign_up_social.php'\" /></td></p>";
                
            echo "</div>";
            
            
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
            
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
    	        
            echo "</footer>";
            
        ?>
        
    </body>
    
</hmtl>