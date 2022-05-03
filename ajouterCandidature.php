<?php
require('functions.php');
      $message = "";
      if(isset($_GET["message"])) $message = $_GET["message"];
      
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajouter candidature</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/modifierCandidature.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
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
      <input type="text" class="fadeIn second" name="nom" placeholder="nom" ><br>
      <label for="apogee">Apogee</label><br>
      <input type="text" class="fadeIn second" name="apogee" placeholder="Apogée" ><br>
      <label for="filiere">Filière</label><br>
      <input type="text" class="fadeIn second" name="filiere" placeholder="Filière" ><br>
      <label for="nonCnc">Nom concours</label><br>
      <input type="text" class="fadeIn second" name="nomCnc" placeholder="nom concours" ><br>
      <label for="etat">Etat</label><br>
      
          <input type='radio' name='etat' value='non encore traiter' checked><label for='etatChoice1'>Non ecore traiter</label>
          <input type='radio' name='etat' value='admis'><label for='etatChoice2'>Admis</label>
          <input type='radio' name='etat' value='rejecté'><label for='etatChoice3'>Rejecté</label><br>
        
      <?php
        if(!empty($message) && $message == "invalid") {
        echo "<br><span style='color:red;'>Inserer toutes les champs</span><br>";
        }
        ?>
      <input type="submit" class="fadeIn fourth" name="go" value="Ajouter">
    </form>
    <?php 
    if(isset($_POST['go'])) {
      if ((isset($_POST['nom'])) and (isset($_POST['apogee'])) and (isset($_POST['filiere'])) and (isset($_POST['nomCnc'])) and (isset($_POST['etat']))) {
       
        $nom = $_POST['nom'];
        $apogee = $_POST['apogee'];
        $filiere = $_POST['filiere'];
        $nomCnc = $_POST['nomCnc'];
        $etat = $_POST['etat'];

        addCandidature ($nom, $apogee, $filiere, $nomCnc, $etat);
        header("location: listeCandidatures.php");
      }
      else header('location: ajouterCandidature.php?message=invalid');

    }
     ?>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>