
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Importer CV, Lettre motivation</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/ajouter-partenaire.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php
    session_start();
      $nom = $_SESSION['username'];
      $apogee = $_SESSION['apogee'];
      $message = "";
      if(isset($_GET["message"])) $message = $_GET["message"];
      $extension = "";
      if(isset($_GET["extension"])) $extension = $_GET["extension"];
      
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
    <form method="POST" enctype="multipart/form-data">
      <label for="cv">CV (.pdf/taille<5MB)</label>
      <input type="file" class="fadeIn second" name="cv">
      <label for="lettre">Lettre de motivation (.pdf/taille<5MB)</label>
      <input type="file" class="fadeIn second" name="lettre">
      <?php  
      if(!empty($extension) && $extension == "invalid") {
        echo "<br><span style='color:red;'>Extension/Taille invalid</span><br>";
        }
      ?>
      <?php
        if(!empty($message) && $message == "invalid") {
        echo "<br><span style='color:red;'>Inserer toutes les champs</span><br>";
        }
        ?>
      <input type="submit" class="fadeIn fourth" name="go" value="Ajouter">
    </form>
    <?php 
    if(isset($_POST['go'])) {
      if (file_exists($_FILES['cv']['tmp_name']) || is_uploaded_file($_FILES['cv']['tmp_name']) and file_exists($_FILES['lettre']['tmp_name']) || !is_uploaded_file($_FILES['lettre']['tmp_name'])) {
        $cvname= $_FILES["cv"]["name"];
        $cv_ext = strtolower(pathinfo($cvname,PATHINFO_EXTENSION));
        $lettrename= $_FILES["lettre"]["name"];
        $lettre_ext = strtolower(pathinfo($lettrename,PATHINFO_EXTENSION));
       if ($cv_ext != 'pdf' or $_FILES["cv"]["size"] > 6097152 or $lettre_ext != 'pdf' or $_FILES["lettre"]["size"] > 6097152) {
         header("location: importer-CV-Lettre.php?extension=invalid&nom=$nom&apogee=$apogee");
       }
       else{
        
        move_uploaded_file($_FILES['cv']['tmp_name'], "C:/wamp64/www/projet/CV/" . "CV-" . "$nom.pdf" );
        move_uploaded_file($_FILES['lettre']['tmp_name'], "C:/wamp64/www/projet/LETTRES/" . "lettre-" ."$nom.pdf" );
        header("location: index-etudiant");
      }
    }
      else header("location: importer-CV-Lettre.php?message=invalid");
    }
     ?>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>