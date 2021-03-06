<!DOCTYPE html>
<!--
Page qui affiche la liste des parties de l'utilisateur
-->
<?php
	/**
	 * Le php qui gère l'affichage de l'historique des parties
	 *
	 * @author Kéven
	 */
	session_start();
	require 'api/UserManager.php';
	mysql_connect("localhost", "root","");
	mysql_select_db("beton395_echec");
	
	if(isset($_GET['id'])){
		$getId = intval($_GET['id']);
		$result = UserManager::getDernierePartie($getId);
	}else{
		$erreur = "Un probème de connection est survenu!";
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<title></title>
    </head>
    <body>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		<div class="row">
			<div class="col-xs-12">
				<p class="text-center">Voici vos dernières parties:</p>
				<?php
				if(isset($result)){
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							$userG = UserManager::get($row["gagnant"]);
							$nomG = $userG["login"];
							if($row["gagnant"] == $row["blanc"]){
								$userL = UserManager::get($row["noir"]);
							}
							else{
								$userL = UserManager::get($row["blanc"]);
							}
							$nomL = $userL["login"];
							echo "Gagnant: ". $nomG." Perdant: ".$nomL;
						}
					}
				}
				else{
					echo '<p class="text-center">Aucune partie trouver</p>';
				}
				?>
				<p class="text-center"><a href="grille.php">Afficher la partie</a></p>
			</div>
		</div>
    </body>
</html>

