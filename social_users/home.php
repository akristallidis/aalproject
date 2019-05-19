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
        
            $rows = $_SESSION['subscription_rows_num']; //Dynamic number for Rowss
            
            
            echo "<div class=\"w3-top w3-theme\">";
            
                echo "<div class=\"w3-container w3-card w3-margin-center\">";
                    echo "<h1><center>" . $_SESSION['firstname'] . "</center></h1>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topleft\">";
                    echo "<input type=\"button\" name=\"logout\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"⎗\" onclick=\"if (confirm('Θέλετε να αποσυνδεθείτε;')) {window.location.href='http://aalproject.000webhostapp.com/aal/users/logout.php'}\"   ></button></p></p>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topright\">";
                    echo "<td><input type=\"button\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"✎\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/edit_social_profile.php'\"/></td>";
                echo "</div>";
                
            echo "</div>";
            
            
            //echo "Συνολικές εγγραφές: " . $_SESSION['subscription_rows_num'] . "</p>";
            
            
            echo "<div class=\"w3-display-middle w3-container\">";
            
            echo '<form method="post" >';
            
            echo "<table class=\"w3-table w3-bordered\">";
                echo "<thead>";
                    echo "<tr clas\"w3-centered\">";
                        echo "<th>Επιλογή</th>";
                        echo "<th>Τίτλος</th>";
                        echo "<th>Περιγραφή</th>";
                        echo "<th>Ημερομηνία</th>";
                        echo "<th>Ώρα</th>";
                echo "</tr>";
            echo "</thead>";
            
            
            for($i=0;$i<$rows;$i++) {
                
                echo "<thead>";
                    echo "<tr>";
                        $a=$_SESSION['subscription_table'][$i][0];
                        echo "<td><input type=\"radio\" id=\"selection\" class=\"w3-centered\" name=\"selection[]\" value=\"$a\"></td>";
                        echo "<td>" . $_SESSION['subscription_table'][$i][1] . "</td>";
                        echo "<td>" . $_SESSION['subscription_table'][$i][2] . "</td>";
                        echo "<td>" . $_SESSION['subscription_table'][$i][3] . "</td>";
                        echo "<td>" . $_SESSION['subscription_table'][$i][4] . "</td>";
                    echo "</tr>";
                echo "</thead>";
                
            }
            
            echo '</table></p>';
            
            
            echo "<td><input type=\"button\" name=\"insert\" value=\"Εισαγωγή\" class=\"w3-block w3-button w3-blue w3-round-large w3-small\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/social_users/new_subscription.php'\" /></td>";
            echo "<td><input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-small\" formaction=\"http://aalproject.000webhostapp.com/aal/social_users/edit_subscription.php\" name=\"action\" value=\"Επεξεργασία\" onclick=\"return edit()\" /></td>";
            echo "<td><input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-small\" formaction=\"http://aalproject.000webhostapp.com/aal/social_users/delete_subscription.php\" name=\"action\" value=\"Διαγραφή\" onclick=\"return check()\" /></td></p>";
            
            
            echo '</form>';
            
            echo "</div>";
            
            
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
            
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
    	        
            echo "</footer>";
            
        ?>
    
        <script type="text/javascript">
            
            function edit() {
                var elements = document.getElementsByName("selection[]");
	            for(var i=0; i < elements.length; i++){
		            if(elements[i].checked) {
                        return true;
		            }
	            }
	            alert('Δεν έχετε επιλέξει εγγραφή για επεξεργασία.');
	            return false;
            }
            
            function check() {
	            var elements = document.getElementsByName("selection[]");
	            for(var i=0; i < elements.length; i++){
		            if(elements[i].checked) {
		                if (confirm('Θέλετε να διαγράψετε την επιλεγμένη εγγραφή;') == true) {
                                return true;
                        }
                        else {
                            return false;
                        }
		            }
	            }
	            alert('Δεν έχετε επιλέξει εγγραφή για διαγραφή.');
	            return false;
            }
        
        </script>
            
    </body>
    
</hmtl>