<?php

   include("actions.php");
   
   include("level_pages/mainhead.php");
   
   if ($_GET['page'] == "bronze") {
   
    include("level_pages/bronzeHeader.php");
      
   }else if ($_GET['page'] == "silver"){
   
     include("level_pages/silverHeader.php");
     
   }else if ($_GET['page'] == "gold"){
   
     include("level_pages/goldHeader.php");
     
   }else{
   
    include("level_pages/normalHeader.php");
   
   }

   include("header.php");
   
   if ($_GET['page'] == "bronze") {
   
    include("level_pages/bronze.php");
      
   }else if ($_GET['page'] == "silver"){
   
     include("level_pages/silver.php");
     
   }else if ($_GET['page'] == "gold"){
   
     include("level_pages/gold.php");
     
   }else{
   
    include("level_pages/normal.php");
   
   }
   
   include("beforeFooter.php");
   
   if ($_GET['page'] == "bronze"){
   
    include("level_pages/bronzeFooter.php");
      
   }else if ($_GET['page'] == "silver"){
   
     include("level_pages/silverFooter.php");
     
   }else if ($_GET['page'] == "gold"){
   
     include("level_pages/goldFooter.php");
     
   }else{
   
     include("footer.php");
   
   }
   



?>
    

   