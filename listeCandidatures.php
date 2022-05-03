<?php
    require('functions.php');
      $searchInput = "";
      if(isset($_GET["searchInput"])) $searchInput = $_GET["searchInput"];
      if(isset($_GET["filiere"])) $filiere = $_GET["filiere"];
      else $filiere = "0";
    
    $cands = array();


         if($filiere=="0"){
            $cands=listCandidaturesNonfiliere($searchInput);
    }else{
            $cands=listCandidaturesfiliere($searchInput, $filiere);
    }
     

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Liste des candidatures</title>
        <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
        <link rel="stylesheet" type="text/css" href="css/listeCandidatures.css?v=<?php echo time(); ?>">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container">
            <div class="panel panel-success margetop60">
                <a href="index-admin.php" title="Retourner vers espace admin"><i class="fa fa-angle-double-left" style="font-size: 25px;"></i></a>
				<div class="panel-heading"><h3>Liste des candidatures</h3></div>
				
				<div class="panel-body">
					<form method="get" action="listeCandidatures.php" class="form-inline">
                            <input type="text" name="searchInput" 
                                   placeholder="Nom, prénom ou Apogée"
                                   value="<?php echo $searchInput ?>" onchange="this.form.submit()">

                            <label for="filiere">Filière:</label>
				            <select name="filiere" onchange="this.form.submit()">
                                    <option value="0" <?php if ($filiere == "0") {
                                        echo "selected";} ?>>Toutes les filières</option>
                                    <option value="GI2" <?php if ($filiere == "GI2") {
                                        echo "selected";} ?>>GI2</option>
                                    <option value="IID2" <?php if ($filiere == "IID2") {
                                        echo "selected";} ?>>IID2</option>
                                    <option value="IRIC2" <?php if ($filiere == "IRIC2") {
                                        echo "selected";} ?>>IRIC2</option>
                                    <option value="GE2" <?php if ($filiere == "GE2") {
                                        echo "selected";} ?>>GE2</option>
                                
				            </select>
				        <input type="submit" value="Chercher">
                            <br>
                                                       
					</form>
                    <div class="row">
                        <div class="col-9">
                    <a href="ajouterCandidature.php">Nouvelle candidature</a></div>
                    <div class="col-3">
                    <a href="fpdf/resultatsPdf.php?searchInput=<?php echo $searchInput ?>&filiere=<?php echo $filiere ?>" title="Telecharger les candidatures PDF"><button><i class="fa fa-file"> Resultas PDF</button></i></a>
                    </div>
                    </div>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>nom etudiant</th> <th>Apogée</th> <th>filiere</th> 
                                <th>concours</th> <th>Etat</th> <th>Actions</th><th>CV</th><th>Lettre</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach ($cands as $value) {
                                
                             ?>
                                <tr>
                                    <td><?php 
                                    $id=$value['idCandidature'];
                                    $nom = $value['nomEtudiant'];
                                    echo $value['nomEtudiant'] ?> </td>
                                    <td><?php 
                                    $apogee = $value['apogeeEtudiant'];
                                    echo $value['apogeeEtudiant'] ?> </td>
                                    <td><?php 
                                    $filiere = $value['filiereEtudiant'];
                                    echo $value['filiereEtudiant'] ?> </td> 
                                    <td><?php 
                                    $nomCnc = $value['nomConcours'];
                                    echo $value['nomConcours'] ?> </td>
                                    <td><?php 
                                    $etat = $value['etat'];
                                    echo $value['etat'] ?> </td>
                                    <td><center>
                                        <a  onclick="return confirm('Etes vous sur de vouloir modifier la candidature')" href='<?php echo "modifierCandidatures.php?id=$id&nom=$nom&apogee=$apogee&filiere=$filiere&nomCnc=$nomCnc&etat=$etat"?>' title="modifier">
                                            <i class="fa fa-edit" style="font-size: 22px;"></i>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la candidature')"
                                            href="<?php echo"supprimerCandidature.php?id=$id" ?>" title="Supprimer">
                                            <i class="fa fa-trash" style="font-size: 22px;"></i>
                                        </center>
                                        </a>
                                    </td>
                                    <td><center><a href="<?php echo "CV/CV-$nom.pdf" ?>" title="telecharger PDF"><i class="fa fa-file"></i></a></center></td>
                                    <td><center><a href="<?php echo "LETTRES/lettre-$nom.pdf" ?>" title="telecharger PDF"><i class="fa fa-file"></i></a></center></td>                                
                                 </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </body>
</HTML>