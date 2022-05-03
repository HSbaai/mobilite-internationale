<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajouter partenaire</title>
  <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/login.css">
 -->  <link rel="stylesheet" type="text/css" href="css/ajouter-partenaire.css?v=<?php echo time(); ?>">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php
    require 'functions.php';
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
      <label for="name">Nom partenaire</label>
      <input type="text" class="fadeIn second" name="name" placeholder="Nom partenaire" >
      <br><label for="site">Site web</label><br>
      <input type="text" class="fadeIn second" name="site" placeholder="Site web" >
      <label for="image">Image (.png/taille<2MB)</label>
      <input type="file" class="fadeIn second" name="image">
      <?php  
      if(!empty($extension) && $extension == "invalid") {
        echo "<br><span style='color:red;'>Extension/Taille invalid</span><br>";
        }
      ?>

      <input type="submit" class="fadeIn fourth" name="go" value="Ajouter">
      <?php
        if(!empty($message) && $message == "invalid") {
        echo "<br><span style='color:red;'>Inserer toutes les champs</span><br>";
        }
        ?>
    </form>
    <?php 
    if(isset($_POST['go'])) {
      if ((isset($_POST['name'])) and (isset($_POST['site'])) and (isset($_FILES['image'])) ) {
        $name = $_POST['name'];
        $site = $_POST['site'];
        $filename= $_FILES["image"]["name"];
        $file_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
       if ($file_ext != 'png' or $_FILES["image"]["size"] > 2097152) {
         header('location: ajouter-partenaire.php?extension=invalid');
       }
       else{
        
        addPartenaire($name, $site);
        
        move_uploaded_file($_FILES['image']['tmp_name'], "C:/wamp64/www/projet/photos/" . "$name.png" );
        header("location: index-admin");
      }
    }
      else header('location: ajouter-partenaire.php?message=invalid');
    }
     ?>

  </div>
</div>

<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>

</body>
</html>