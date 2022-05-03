<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/modifierCandidature.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php
      require('functions.php');
      $id = "";
      if(isset($_GET["id"])) $id = $_GET["id"];
      $nom = "";
      if(isset($_GET["nom"])) $nom = $_GET["nom"];
      $apogee = "";
      if(isset($_GET["apogee"])) $apogee = $_GET["apogee"];
      $filiere = "";
      if(isset($_GET["filiere"])) $filiere = $_GET["filiere"];
      $nomCnc = "";
      if(isset($_GET["nomCnc"])) $nomCnc = $_GET["nomCnc"];
      $etat = "";
      if(isset($_GET["etat"])) $etat = $_GET["etat"];
      
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
      <label for="nom">Nom étudiant</label><br>
      <input type="text" class="fadeIn second" name="nom" placeholder="nom" value="<?php echo  $nom ?>"><br>
      <label for="apogee">Apogee</label><br>
      <input type="text" class="fadeIn second" name="apogee" placeholder="Apogée" value="<?php echo  $apogee ?>"><br>
      <label for="filiere">Filière</label><br>
      <input type="text" class="fadeIn second" name="filiere" placeholder="Filière" value="<?php echo  $filiere ?>"><br>
      <label for="nonCnc">Nom concours</label><br>
      <input type="text" class="fadeIn second" name="nomCnc" placeholder="nom concours" value="<?php echo  $nomCnc ?>"><br>
      <label for="etat">Etat</label><br>
      <?php
      if ($etat == "non encore traiter") {
          echo "<input type='radio' name='etat' value='non encore traiter' checked><label for='etatChoice1'>Non ecore traiter</label>";
          echo "&nbsp;&nbsp;<input type='radio' name='etat' value='admis'><label for='etatChoice2'>Admis</label>";
          echo "&nbsp;&nbsp;<input type='radio' name='etat' value='rejecté'><label for='etatChoice3'>Rejecté</label><br>";
        }  
        else if ($etat == "admis") {
          echo "<input type='radio' name='etat' value='non encore traiter' ><label for='etatChoice1'>non encore traiter</label>";
          echo "&nbsp;&nbsp;<input type='radio' name='etat' value='admis' checked><label for='etatChoice2'>Admis</label>";
          echo "&nbsp;&nbsp;<input type='radio' name='etat' value='rejecté'><label for='etatChoice3'>Rejecté</label><br>";
        }
        else{
          echo "<input type='radio' name='etat' value='non encore traiter' ><label for='etatChoice1'>Non ecore traiter</label>";
          echo "&nbsp;&nbsp;<input type='radio' name='etat' value='admis' ><label for='etatChoice2'>Admis</label>";
          echo "&nbsp;&nbsp;<input type='radio' name='etat' value='rejecté' checked><label for='etatChoice3'>Rejecté</label><br>";
        }
      ?>
      
      <input type="submit" class="fadeIn fourth" name="go" value="Modifier">
    </form>
    <?php 
    if(isset($_POST['go'])) {
        $nom = $_POST['nom'];
        $apogee = $_POST['apogee'];
        $filiere = $_POST['filiere'];
        $nomCnc = $_POST['nomCnc'];
        $etat = $_POST['etat'];

        updateCandidature( $nom, $apogee, $filiere, $nomCnc, $etat, $id);
        header("location: listeCandidatures");

    }
     ?>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>