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
        
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1.0>
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
                    echo "<input type=\"button\" name=\"logout\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"⎗\" onclick=\"if (confirm('Θέλετε να αποσυνδεθείτε;')) {window.location.href='http://aalproject.000webhostapp.com/aal/users/logout.php'}\"   ></button></p></p>";
                echo "</div>";
            
                echo "<div class=\"w3-display-topright\">";
                    echo "<td><input type=\"button\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"✎\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/users/edit_normal_profile.php'\"/></td>";
                echo "</div>";
                
            echo "</div>";
            
        
            echo "<div class=\"w3-display-middle w3-container\">";
            
                echo "<td><input type=\"button\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Κοινωνικές Υπηρεσίες\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/simple_users/social_services_menu.php'\" /></td></p>";
            
                echo "<td><input type=\"button\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Υπενθυμίσεις\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/simple_users/reminders_menu.php'\" /></td></p>";
            
                echo "<td><input type=\"button\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Πρόγνωση καιρού\" onclick=\"alert ('Δεν λειτουργεί προσωρινά.')\" /></td></p>";
            
                echo "<td><input type=\"button\" class=\"w3-block w3-button w3-blue w3-round-large w3-large\" value=\"Χάρτης φαρμακείων\" onclick=\"alert ('Δεν λειτουργεί προσωρινά.')\" /></td></p>";
            
            echo "</div>";
            
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
            echo "</footer>";
            
        ?>
        
    </body>
    
</hmtl>