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

            $id = $_SESSION['reminder_for_update'][0];
            $name = $_SESSION['reminder_for_update'][1];
            $description = $_SESSION['reminder_for_update'][2];
            $date = $_SESSION['reminder_for_update'][3];
            $time = $_SESSION['reminder_for_update'][4];
            $repeated = $_SESSION['reminder_for_update'][5];
            $_SESSION['delete_reminder'] = $id;
            
            echo "<form style=margin-top:60px; id=\"edit-reminder-html\" action=\"http://aalproject.000webhostapp.com/aal/api/reminders/update.php\" method=\"POST\">";
                echo "<div class=\"w3-top w3-container w3-theme\">";
            
                    echo "<div class=\"w3-margin-center\">";
                        echo "<center><input type=\"submit\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" value=\"✔\" /></center>";
                    echo "</div>";
                
                    echo "<div class=\"w3-display-topleft\">";
                        echo "<td><input type=\"submit\" class=\"w3-button w3-blue w3-xxlarge\" formaction=\"http://aalproject.000webhostapp.com/aal/simple_users/reminders.php\" name=\"action\" value=\"⇦\" /></td></p>";
                    echo "</div>";
                
                    echo "<div class=\"w3-display-topright\">";
                        echo "<td><input type=\"submit\" name=\"action\" class=\"w3-button w3-blue w3-round-large w3-xxlarge\" formaction=\"http://aalproject.000webhostapp.com/aal/api/reminders/delete.php\" onclick=\"return check()\" value=\"🗑\" /></td></p>";
                    echo "</div>";
    	        
                echo "</div>";
	        
			
		        echo "<div class=\"w3-display-middle w3-container\">";
        
            		echo "<input id=\"name\" name=\"name\" type=\"text\" class=\"w3-input\" placeholder=\"Όνομα υπενθύμισης\" value=\"$name\"></p>";
            	
				    echo "<textarea id=\"description\" name=\"description\" rows=\"5\" cols=\"20\" wrap=\"soft\" style=\"width:200px; class=\"w3-input\" placeholder=\"Περιγραφή υπενθύμισης\" >$description</textarea></p>";
            	
            		echo "<input id=\"alarm_date\" name=\"alarm_date\" type=\"date\" class=\"w3-input\" placeholder=\"Ημερομηνία\" value=\"$date\"></p>";
    	
            		echo "<input id=\"alarm_time\" name=\"alarm_time\" type=\"time\" class=\"w3-input\" placeholder=\"Ώρα\" value=\"$time\"></p>";
            		
            		if ($repeated==1) {
                        echo "<td> <input type=\"radio\" id=\"no_repeat\" name=\"repeated\" value=\"1\" checked=\"checked\">" . "Χωρίς ειδοποίηση." . "</td></p>";
			            echo "<td> <input type=\"radio\" id=\"repeat_one\" name=\"repeated\" value=\"2\">" . "Ειδοποίηση μία φορά." . "</td></p>";
			            echo "<td> <input type=\"radio\" id=\"repeat_allways\" name=\"repeated\" value=\"3\">" . "Ειδοποίηση κάθε μέρα." . "</td></p>";
            		}
            		
            		else if ($repeated==2) {
            		    echo "<td> <input type=\"radio\" id=\"no_repeat\" name=\"repeated\" value=\"1\" >" . "Χωρίς ειδοποίηση." . "</td></p>";
			            echo "<td> <input type=\"radio\" id=\"repeat_one\" name=\"repeated\" value=\"2\" checked=\"checked\">" . "Ειδοποίηση μία φορά." . "</td></p>";
			            echo "<td> <input type=\"radio\" id=\"repeat_allways\" name=\"repeated\" value=\"3\">" . "Ειδοποίηση κάθε μέρα." . "</td></p>";
            		}
            		else {
            		    echo "<td> <input type=\"radio\" id=\"no_repeat\" name=\"repeated\" value=\"1\" >" . "Χωρίς ειδοποίηση." . "</td></p>";
			            echo "<td> <input type=\"radio\" id=\"repeat_one\" name=\"repeated\" value=\"2\" >" . "Ειδοποίηση μία φορά." . "</td></p>";
			            echo "<td> <input type=\"radio\" id=\"repeat_allways\" name=\"repeated\" value=\"3\" checked=\"checked\">" . "Ειδοποίηση κάθε μέρα." . "</td></p>";
            		}
            	    
            	
    	        echo "</div>";
    	        
    	    echo "</form>";
            
            
            echo "<footer class=\"w3-bottom w3-container w3-theme\">";
    	        echo "<h15>Designed by Zdragkas, Iliopoulos, Krystallidis, Mpouris ©</h15>";
            echo "</footer>";
        
        ?>
        
        <script type="text/javascript">
            function check() {
                if (confirm('Θέλετε να διαγράψετε την επιλεγμένη εγγραφή;') == true) {
                    return true;
                }
                else {
                    return false;
                }
		    }
		</script>
		
    </body>

</html>