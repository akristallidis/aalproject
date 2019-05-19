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
        
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="http://aalproject.000webhostapp.com/aal/assets/img/social_icon.ico" type="image/x-icon">
        <title>AAL Social Services</title>

        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
        <link rel="stylesheet" href="./assets/css/style.css">
  
    </head>

    <body>
        
        <?php
            $rows = $_SESSION['subscription_rows_num'];
            echo '<table border="1">';
            
            echo '<tr>';
            echo "<td>Τίτλος</td>";
            echo "<td>Περιγραφή</td>";
            echo "<td>Ημερομηνία</td>";
            echo "<td>Ώρα</td>";
            echo '</tr>';
            
            for($i=0;$i<$rows;$i++) {
                
                echo '<tr>';
                echo '<td>' . $_SESSION['subscription_table'][$i][1] . '</td>';
                echo '<td>' . $_SESSION['subscription_table'][$i][2] . '</td>';
                echo "<td>" . $_SESSION['subscription_table'][$i][3] . "</td>";
                echo "<td>" . $_SESSION['subscription_table'][$i][4] . "</td>";
                echo '</tr>';
                
            }
            
            echo '</table></p>';
            echo "<td><input type=\"submit\" onclick=\"window.location.href='http://aalproject.000webhostapp.com/aal/simple_users/social_services_list.php'\" name=\"action\" value=\"Πίσω\" /></td></p>";

        ?>
    

            
    </body>
    
</hmtl>