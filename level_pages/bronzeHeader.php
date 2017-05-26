  <link rel="stylesheet" type="text/css" href="style/_bronze_level.css">

</head>

<body>
  <div class="container-fluid" id="wholeBody">
    <div class="row" id="topBar">
      <div class="col-2" id="logo">
        <?php if ($_SESSION['id']) {
            $query = "SELECT * FROM users WHERE id = '". mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
            
            echo "<div class='welcome-title'><p> Welcome <br>".$row['username']."</p></div>"; 
            
            }
          ?>
      </div>
      <div class="col-8" id="top">
        <h1 id = "levelTitle">BRONZE WORLD</h1>