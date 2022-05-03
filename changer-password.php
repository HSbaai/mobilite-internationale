<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>changer mot de pass</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php
      session_start();
      require('functions.php');
      $message = "";
      if(isset($_GET["message"]))
      $message = $_GET["message"];

      $apogee = $_SESSION['apogee'];
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

    <form method="POST">
      <?php
      echo "<input type='text' id='username' class='fadeIn second' name='username' placeholder='Apogée' value=$apogee>"
    ?>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="nouveau mot de passe">
      <input type="password" id="newpassword" class="fadeIn third" name="newpassword" placeholder="confirmer mot de passe">
      <input type="date" id="datenaissance" class="fadeIn third" name="datenaissance" placeholder="datenaissance">
      <?php
        if(!empty($message) && $message == "invalid") {
        echo "<br><span style='color:red;'>mots de passe non identiques ou date naissance invalid</span><br>";
        }
      ?>
      <input type="submit" class="fadeIn fourth" name="changer" value="valider">

    </form>
    <?php 
    if(isset($_POST['changer'])) {
        $apogee = $_POST['username'];
        $result=getE($apogee);
          $dateBD = $result['date_naissance'];
          $nomet = $result['nom'];

        $dateinput = $_POST['datenaissance'];
        $newpassword=$_POST['newpassword'];
        $password=$_POST['password'];

        if (($newpassword == $password) and ($dateinput == $dateBD) and (isset($_POST['password'])) and (isset($_POST['newpassword'])) and (isset($_POST['datenaissance']))) 
          {
            update_password($apogee, $newpassword);
                header("location: index-etudiant.php?nom=$nomet&apogee=$apogee");
          }
          else header("location: changer-password.php?message=invalid&apogee=$apogee");

    }
     ?>

    <!-- Remind Passowrd -->
<!--     <div id="formFooter">
      <a class="underlineHover" href="#">Mot de pass oublié?</a>
    </div>
 -->
  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>