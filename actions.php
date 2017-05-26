<?php
  //sleep(2);
  
  include("functions.php");
  
    $login = array('top' => 1);
  
   
 
    if ($_GET['action'] == "loginSignup") {

      $error = array();
      
       if(!$_POST['email'])
      {
         array_push ($error, "An email address is required.");
        
      }else if(!$_POST['password']){
      
         array_push ($error, "Password is required.");
        
      }else if(!$_POST['username']){
          
          if ($_POST['loginActive'] == "0"){
             array_push ($error, "Username is required.");
          }

      }else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
      
        $query = "SELECT * FROM users WHERE username = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
            
            if($_POST['email'] != $row['username']){
              
               array_push ($error, "Please enter a valid email address or check your username.");
              
            }
      
        
      }
      
      
      
      if(isset($_POST['username'])){
        if ($_POST['loginActive'] == "0"){
            if(strlen($_POST['username']) > 10){
          array_push ($error, "Your username is too long(Max: 10 character)");
        }
      }
        
      }
      if(isset($_POST['username'])){
        if ($_POST['loginActive'] == "0"){
             if(!ctype_alnum($_POST['username'])){
               array_push ($error,  "Your username should contain letters and numbers only.(no spaces");
          }
        }
      
       
      }
      if(isset($_POST['password'])){
         if ($_POST['loginActive'] == "0"){
          if(strlen($_POST['password']) < 4 or strlen($_POST['password']) > 13 ){
             array_push($error, "Your password's length should be more than 4 less than 14 characters");
          }
        }
      }
      
      
      if (!empty($error)) {
            
            print json_encode($error);
            exit();
            
        }

     if ($_POST['loginActive'] == "0") {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) $error = "That email address is already taken.";
            
            $xquery = "SELECT * FROM users WHERE username = '". mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";
            $xresult = mysqli_query($link, $xquery);
            if (mysqli_num_rows($xresult) > 0) $error = "That username is already taken.";
            else {
                
                $query = "INSERT INTO users (`email`, `username`, `password`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['username'])."', '". mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id'] = mysqli_insert_id($link);
                    
                    $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    print json_encode($login);
                    return;
                    
                    
                    
                } else {
                    
                     array_push ($error, "Couldn't create user - please try again later");
                    
                }
                
            }
            
        } else {
        
            
            
            $query = "SELECT * FROM users WHERE (username = '". mysqli_real_escape_string($link, $_POST['email'])."') OR ( email = '". mysqli_real_escape_string($link, $_POST['email'])."' ) LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                    
                    
                    
                    
                    $_SESSION['id'] = $row['id'];
                    
                   /* if($_POST['stayLoggedIn'] == "1"){
                    
                      setcookie("id", $row['id'], time() + 60*60*24*365);
                      
                    }*/
                    
                    print json_encode($login);
                    return;
                    
                } else {
                    
                    array_push ($error, "Could not find that (username or email)/password combination. Please try again.");
                    
                }

            
        }
        
         if (!empty($error)) {
            
            print json_encode($error);
            exit();
            
        }
      
      
      
    }
    
        
    
        
     if($_GET['page'] == "bronze"){
     
      echo '<span id="hidden_value">bronze</span>';
      
     }else if($_GET['page'] == "silver"){
     
      echo '<span id="hidden_value">silver</span>';
      
     }else if($_GET['page'] == "gold"){
     
      echo '<span id="hidden_value">gold</span>';
      
     }else {
     
      echo '<span id="hidden_value">normal</span>';
      
     }


    
   

?>