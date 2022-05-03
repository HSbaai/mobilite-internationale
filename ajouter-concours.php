<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/modifier.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php
      require('functions.php');
      $message = "";
      if(isset($_GET["message"])) $message = $_GET["message"];
      
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
    <form method="POST">
      <label for="name">Nom concours</label>
      <input type="text" class="fadeIn second" name="name" placeholder="Nom Concours" >
      <br><label for="begindate">Date debut</label><br>
      <input type="date"  class="fadeIn third" name="begindate" placeholder="Date début">
      <br><label for="stat">Etat</label><br>
      
          <input type='radio' name='stat' value='ouvert' checked><label for='statChoice1'>Ouvert</label>
          <span> </span><input type='radio' name='stat' value='ferme'><label for='statChoice2'>Ferme</label><br>
        
      <label for="conditions">Conditions d'admission</label>
      <textarea rows="5" class="fadeIn third" name="conditions"></textarea>
      <label for="procedurea">Procedure d'admission</label>
      <textarea rows="5" class="fadeIn third" name="procedurea"></textarea>
      <label for="procedurec">Procedure C</label>
      <textarea rows="5" class="fadeIn third" name="procedurec"></textarea>
      <label for="datetest">Calendrier concours</label>
      <input type="date"  class="fadeIn third" name="datetest" placeholder="Calendrier concours">
      <input type="submit" class="fadeIn fourth" name="go" value="Ajouter">
      <?php
        if(!empty($message) && $message == "invalid") {
        echo "<br><span style='color:red;'>Inserer toutes les champs</span><br>";
        }
        ?>
    </form>
    <?php 
    if(isset($_POST['go'])) {
      if ((isset($_POST['name'])) and (isset($_POST['begindate'])) and (isset($_POST['stat'])) and (isset($_POST['conditions'])) and (isset($_POST['procedurec'])) and (isset($_POST['procedurea'])) and (isset($_POST['datetest']))) {
       
        $name = $_POST['name'];
        $begindate = $_POST['begindate'];
        $stat = $_POST['stat'];
        $conditions = $_POST['conditions'];
        $procedurec = $_POST['procedurec'];
        $procedurea = $_POST['procedurea'];
        $datetest = $_POST['datetest'];

        add_concours ( $name, $begindate, $stat, $conditions, $procedurec, $procedurea, $datetest);
        header("location: index-admin");
      }
      else header('location: ajouter-concours.php?message=invalid');

    }
     ?>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>