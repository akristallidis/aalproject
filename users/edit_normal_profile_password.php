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

    <script type="text/javascript"> 
    <?php $i=0;?>
        function display_c() {
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct()',refresh)
        }
        
        function display_ct() {
        var title = "<?php echo $_SESSION['notifications_table'][$i][0]; ?>";
        var reminder_date = "<?php echo $_SESSION['notifications_table'][$i][1]; ?>";
        var reminder_time = "<?php echo $_SESSION['notifications_table'][$i][2]; ?>";
        var repeated = <?php echo $_SESSION['notifications_table'][$i][3]; ?>;
        
        var strcount
        var x 
        var x1
        var currentTime = new Date()
        var tomorrow = new Date()
        var month = currentTime.getMonth() + 1
        var day = currentTime.getDate()
        var year = currentTime.getFullYear()
        var hours = currentTime.getHours()
        var minutes = currentTime.getMinutes()
        var seconds= currentTime.getSeconds()
        tomorrow.setDate(currentTime.getDate()+1)
        var month2 = tomorrow.getMonth() + 1
        var day2 = tomorrow.getDate()
        var year2 = tomorrow.getFullYear()
        
        if (hours < 10){
            hours = "0" + hours
        }
        if (minutes < 10){
            minutes = "0" + minutes
        }
        if (seconds < 10){
            seconds = "0" + seconds
        }
        if (month < 10){
            month = "0" + month
        }
        if (day < 10){
            day = "0" + day
        }
        if (month2 < 10){
            month2 = "0" + month2
        }
        if (day2 < 10){
            day2 = "0" + day2
        }
        
        x1=year + "-" + month + "-" + day
        x2=year2 + "-" + month2 + "-" + day2
        x3=hours + ":" + minutes + ":"+seconds
        
        if(x3==reminder_time && repeated==2 && x1==reminder_date){
            alert(title + "\nΠρογραμματισμένη ώρα: " + reminder_time + "\nΠρογραμματισμένη ημερομηνία: " + reminder_date);
        }
        
        if(x3==reminder_time && repeated==3 && x1>=reminder_date){
            alert(title + "\nΠρογραμματισμένη ώρα: " + reminder_time + "\nΠρογραμματισμένη ημερομηνία: " + reminder_date);
        }
        <?php $i++;?>;
        tt=display_c();
    }
    
</script>

    <body onload=display_ct();>
    <span id='ct' ></span>
        
        <?php
        
            echo "<div class=\"w3-top w3-theme\">";
            
                echo "<div class=\"w3-container w3-card w3-margin-center\">";
                    echo "<h1><center>AAL Project</center></h1>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topleft\">";
                    echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/edit_normal_profile.php'\" name=\"action\" value=\"⇦\" /></td></p>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topright\">";
                    echo "<td><input type=\"button\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"⟰\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/simple_users/menu.php'\" /></td></p>";
                echo "</div>";
            
            echo "</div>";
            
            echo "<div class=\"w3-display-middle w3-container\">";
            
			    echo "<form id=\"edit-password-html\" class=\"edit-password-html\" action=\"http://aalproject.000webhostapp.com/aal/api/users/update_password.php\" method=\"POST\">";
            
            		echo "<input id=\"password_new\" name=\"password_new\" type=\"password\" class=\"w3-input\" data-type=\"password\" placeholder=\"Νέος κωδικός πρόσβασης\">";
    						
        	    	echo "<input id=\"password_new_confirm\" name=\"password_new_confirm\" type=\"password\" class=\"w3-input\" data-type=\"password\" placeholder=\"Επιβεβαίωση νέου κωδικού\">";
        	    
    	            echo "<input type=\"submit\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Ενημέρωση κωδικού πρόσβασης\" onclick=\"return edit_password()\"></p>";
    	        
    	        echo "</form>";
    		    
            echo "</div>";
            
            
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
            echo "</footer>";
            
            ?>
            
            <script type="text/javascript">
    	    
            function edit_password() {
                var password_new = document.getElementById("password_new").value;
                var password_new_confirm = document.getElementById("password_new_confirm").value;
                if (password_new && password_new_confirm) {
                    if (password_new==password_new_confirm) {
    	                return true;
    	            }
    	            else {
    	                document.getElementById("password_new").style.backgroundColor = "#FF9797";
    	                document.getElementById("password_new_confirm").style.backgroundColor = "#FF9797";
    	                alert('Οι κωδικοί δεν συμπίπτουν.');
    	                return false;
    	            }
                }    
                else {
                    document.getElementById("password_new").style.backgroundColor = "#FF9797";
                    document.getElementById("password_new_confirm").style.backgroundColor = "#FF9797";
                    alert('Όλα τα πεδία πρέπει να συμπληρωθούν.');
                    return false;
                }
            }
            
            </script>
        
    </body>

</html>