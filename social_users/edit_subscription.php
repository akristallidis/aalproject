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
        
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  
    </head>

    <body>
        
        <?php
            
            
            echo "<form style=margin-top:60px; id=\"edit-reminder-html\" action=\"http://aalproject.000webhostapp.com/aal/api/subscription/update.php\" method=\"POST\">";
            
                echo "<div class=\"w3-top w3-container w3-theme\">";
                
                    echo "<div class=\"w3-container w3-card w3-margin-center\">";
                        echo "<h1><center>" . $_SESSION['firstname'] . "</center></h1>";
                    echo "</div>";
            
                    echo "<div class=\"w3-display-topleft\">";
                        echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" formaction=\"http://aalproject.000webhostapp.com/aal/social_users/home.php\" name=\"action\" value=\"⇦\" /></td></p>";
                    echo "</div>";
            
                    echo "<div class=\"w3-display-topright\">";
                        echo "<td><input type=\"button\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"✔\" ></td></p>";
                    echo "</div>";
                    
                echo "</div>";
            
            echo "</form>";
                
            
            echo "<div class=\"w3-display-middle w3-container\">";
            
                echo $_POST['selection'];
            
            echo "</div>";
        
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
    	        echo "<h15>Designed by Zdragkas, Hliopoulos, Krystallidis, Mpouris ©</h15>";
            echo "</footer>";
        
        ?>
        
    </body>

</html>