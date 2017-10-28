<?php

session_start();


$link = mysqli_connect("localhost", "reflekses", "************", "reflekses");

if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }
    
 if ($_GET['function'] == "logout") {
        
        session_unset();
        
        header("Location: http://www.reflekses.com/");
        die();
        
    }

    function displayScores($type) {
        
        
        global $link;
        
        if($type == 'normal'){
        
          $query = "SELECT * FROM users ORDER BY `score` ASC LIMIT 100";
          $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 0) {
            
            echo "There are no score to display.";
            
        } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
                
                if($row['score'] != 999999){
                  
                   if($row['id'] == $_SESSION['id']){
                      echo "<div id='individual-score' style='color:darkred;'>" .$i.". " .ucfirst($row['username']). ": " .$row['score']. "</div>";
                    }else{
                      echo "<div id='individual-score'>" .$i.". " .ucfirst($row['username']). ": " .$row['score']. "</div>";
                    }
                    $i++;
                 }
             }
         
          }
        
       }else if ($type == 'bronze'){
          
          $query = "SELECT * FROM users ORDER BY `bronze_score` ASC LIMIT 100";
          $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 0) {
            
            echo "There are no score to display.";
            
        } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
                
                if($row['bronze_score'] != 999999){
                  
                   if($row['id'] == $_SESSION['id']){
                      echo "<div id='individual-score' style='color:darkred;'>" .$i.". " .ucfirst($row['username']). ": " .$row['bronze_score']. "</div>";
                    }else{
                      echo "<div id='individual-score'>" .$i.". " .ucfirst($row['username']). ": " .$row['bronze_score']. "</div>";
                    }
                    $i++;
                 }
             }
         
          }
          
       }else if ($type == 'silver'){
          
          $query = "SELECT * FROM users ORDER BY `silver_score` ASC LIMIT 100";
          $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 0) {
            
            echo "There are no score to display.";
            
        } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
                
                if($row['silver_score'] != 999999){
                  
                   if($row['id'] == $_SESSION['id']){
                      echo "<div id='individual-score' style='color:darkred;'>" .$i.". " .ucfirst($row['username']). ": " .$row['silver_score']. "</div>";
                    }else{
                      echo "<div id='individual-score'>" .$i.". " .ucfirst($row['username']). ": " .$row['silver_score']. "</div>";
                    }
                    $i++;
                 }
             }
         
          }
          
       }else if ($type == 'gold'){
          
          $query = "SELECT * FROM users ORDER BY `gold_score` ASC LIMIT 100";
          $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 0) {
            
            echo "There are no score to display.";
            
        } else {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
                
                if($row['gold_score'] != 999999){
                  
                   if($row['id'] == $_SESSION['id']){
                      echo "<div id='individual-score' style='color:darkred;'>" .$i.". " .ucfirst($row['username']). ": " .$row['gold_score']. "</div>";
                    }else{
                      echo "<div id='individual-score'>" .$i.". " .ucfirst($row['username']). ": " .$row['gold_score']. "</div>";
                    }
                    $i++;
                 }
             }
         
          }
          
       }
        
        
       
      
 }

 
  
 
 
        
         
     if ($_GET['action'] == "yourScore"){
    
      if($_SESSION['id']){
      
      $values = array('first' => 1);
      
      if($_POST['level'] == "normal"){
        
        $xquery = "SELECT * FROM users WHERE id = '". mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
            
            $xresult = mysqli_query($link, $xquery);
            
            $xrow = mysqli_fetch_assoc($xresult);
            
            if($xrow['score'] > $_POST['score'] or $xrow['score'] == 0 ){
              
              $query = "UPDATE users SET score = '".$_POST['score']."' WHERE id = '".$_SESSION['id']."' ";
              mysqli_query($link, $query);   
              return;
         }
         
         print json_encode($values);
            
      }else if ($_POST['level'] == "bronze"){
          
          $xquery = "SELECT * FROM users WHERE id = '". mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
            
            $xresult = mysqli_query($link, $xquery);
            
            $xrow = mysqli_fetch_assoc($xresult);
            
            if($xrow['bronze_score'] > $_POST['score'] or $xrow['bronze_score'] == 0 ){
              
              $query = "UPDATE users SET bronze_score = '".$_POST['score']."' WHERE id = '".$_SESSION['id']."' ";
              mysqli_query($link, $query);
              
            }
            
            print json_encode($values);
            return;
          
      }else if ($_POST['level'] == "silver"){
          
          $xquery = "SELECT * FROM users WHERE id = '". mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
            
            $xresult = mysqli_query($link, $xquery);
            
            $xrow = mysqli_fetch_assoc($xresult);
            
            if($xrow['silver_score'] > $_POST['score'] or $xrow['silver_score'] == 0 ){
              
              $query = "UPDATE users SET silver_score = '".$_POST['score']."' WHERE id = '".$_SESSION['id']."' ";
              mysqli_query($link, $query);
              return;
              
            }
            
            print json_encode($values);
          
      }else if ($_POST['level'] == "gold"){
          
          $xquery = "SELECT * FROM users WHERE id = '". mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
            
            $xresult = mysqli_query($link, $xquery);
            
            $xrow = mysqli_fetch_assoc($xresult);
            
            if($xrow['gold_score'] > $_POST['score'] or $xrow['gold_score'] == 0 ){
              
              $query = "UPDATE users SET gold_score = '".$_POST['score']."' WHERE id = '".$_SESSION['id']."' ";
              mysqli_query($link, $query);
              
            }
            
            print json_encode($values);
            return;
          
      }
      
        
            
        
      }else {
      
        print json_encode("Please login if you want your score to be saved.");
      }
      
      
      
    }
    

     
    
?>


