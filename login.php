<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php
    // include('config.php');

      $message = "";
      if(isset($_GET["message"]))
      $message = $_GET["message"];
    ?>
<div >
  <center><img src="images/logoensak.png" class="imagetop fadeIn first"></center>
</div>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <i class="fa fa-user"></i>
    </div>

    <!-- Login Form -->
    <form action="trait_login.php" method="POST">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Apogée">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="mot de pass">
      <input type="submit" class="fadeIn fourth" name="login" value="se connecter">
      <?php
        if(!empty($message) && $message == "invalid") {
        echo "<br><span style='color:red;'>Apogée/Mot de passe invalides</span><br>";
        }
      ?>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Mot de pass oublié?</a>
    </div>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>