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
      $id = "";
      if(isset($_GET["id"])) $id = $_GET["id"];
      $nom = "";
      if(isset($_GET["nom"])) $nom = $_GET["nom"];
      $date_debut = "";
      if(isset($_GET["date_debut"]))
      { 
        $date_debut = $_GET["date_debut"];
        $newdate_debut = date("Y-m-d", $date_debut);
      }
      $etat = "";
      if(isset($_GET["etat"])) $etat = $_GET["etat"];
      $cond = "";
      if(isset($_GET["cond"])) $cond = $_GET["cond"];
      $proca = "";
      if(isset($_GET["proca"])) $proca = $_GET["proca"];
      $procc = "";
      if(isset($_GET["procc"])) $procc = $_GET["procc"];
      $calend_concours = "";
      if(isset($_GET["calend_concours"])) 
        {
          $calend_concours = $_GET["calend_concours"];
          $newcalend_concours = date("Y-m-d", $calend_concours);
        }
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
      <input type="text" class="fadeIn second" name="name" placeholder="nom" value="<?php echo  $nom ?>">
      <br><label for="begindate">Date debut</label><br>
      <input type="date"  class="fadeIn third" name="begindate" placeholder="Date début" value="<?php echo  $newdate_debut ?>">
      <br><label for="stat">Etat</label><br>
      <?php
      if ($etat == "ouvert") {
          echo "<input type='radio' name='stat' value='ouvert' checked><label for='statChoice1'>Ouvert</label>";
          echo "<span> </span><input type='radio' name='stat' value='ferme'><label for='statChoice2'>Ferme</label><br>";
        }  
        else {
          echo "<input type='radio' name='stat' value='ouvert' ><label for='statChoice1'>Ouvert</label>";
          echo "<span> </span><input type='radio' name='stat' value='ferme' checked><label for='statChoice2'>Ferme</label><br>";
        }
      ?>
      <label for="conditions">Conditions d'admission</label>
      <textarea rows="5" class="fadeIn third" name="conditions">
        <?php
       $conditions_array=explode('.', $cond);
       foreach ($conditions_array as $value) {
          echo "$value.\n";
        } 
      ?>
        </textarea>
      <label for="procedurea">Procedure d'admission</label>
      <textarea rows="5" class="fadeIn third" name="procedurea"><?php
       $proca_array=explode('.', $proca);
       foreach ($proca_array as $value) {
          echo "$value.\n";
        } 
      ?>
      </textarea>
      <label for="procedurec">Procedure C</label>
      <textarea rows="5" class="fadeIn third" name="procedurec">
        <?php
       $procc_array=explode('.', $procc);
       foreach ($procc_array as $value) {
          echo "$value.\n";
        } 
      ?>
          
      </textarea>
      <label for="datetest">Calendrier concours</label>
      <input type="date"  class="fadeIn third" name="datetest" placeholder="Calendrier concours" value="<?php echo  $newcalend_concours ?>">
      <input type="submit" class="fadeIn fourth" name="go" value="Modifier">
    </form>
    <?php 
    if(isset($_POST['go'])) {
        $name = $_POST['name'];
        $begindate = $_POST['begindate'];
        $stat = $_POST['stat'];
        $conditions = $_POST['conditions'];
        $procedurec = $_POST['procedurec'];
        $procedurea = $_POST['procedurea'];
        $datetest = $_POST['datetest'];
        update_concours($name, $begindate, $stat, $conditions, $procedurec, $procedurea, $datetest, $id);
        header("location: index-admin");

    }
     ?>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>