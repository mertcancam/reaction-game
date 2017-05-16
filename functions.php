<?php

session_start();


$link = mysqli_connect("shareddb1b.hosting.stackcp.net", "reaction-game-3570e7", "mg2004311320", "reaction-game-3570e7");

if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }
    
 if ($_GET['function'] == "logout") {
        
        session_unset();
        
    }
    
  
    
    
    function displayScores() {
        
        
        global $link;
        
        
        $query = "SELECT * FROM users ORDER BY `score` ASC LIMIT 100";
        $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 0) {
            
            echo "There are no score to display.";
            
        } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
                
                if($row['score'] != 999999)
                   echo "<div id='individual-score'>" .$i.". " .ucfirst($row['username']). ": " .$row['score']. "</div>";
                   $i++;
                
                
                
        }
        
      }
      
 }
?>


