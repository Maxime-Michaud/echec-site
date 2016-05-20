<!DOCTYPE html>
<!--
Page qui affiche les statistique de l'utilisateur
-->
<?php
	/**
	 * Le php qui gère les statistiques des utilisateurs
	 *
	 * @author Kéven
	 */
	session_start();
	require 'api/UserManager.php';
	require 'api/PartieManager.php';
	mysql_connect("localhost", "root","");
	mysql_select_db("beton395_echec");
	
	if(isset($_GET['id'])){
		$getId = intval($_GET['id']);
		$result = UserManager::getDernierePartie($getId);
		$user = UserManager::get($getId);
		
	}else{
		$erreur = "Un probème de connection est survenu!";
	}
	
	$victoire = 0;
	$defaite = 0;
	$mcoup = 0;
	$tour = 0;
	$elo = 150;
	if(isset($result)){
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$userG = UserManager::get($row["gagnant"]);
				$nomG = $userG["login"];
				if($row["gagnant"] == $getId){
					$victoire++;
				}
				else{
					$defaite++;
				}
				if($getId == $row["blanc"]){
					$elo = $row["elo_blanc"];
				}
				else{
					$elo = $row["elo_noir"];
				}
				$resultTour = PartieManager::getTours($id);
				if ($resultTour->num_rows > 0) {
					// output data of each row
					while($row = $resultTour->fetch_assoc()) {
						$tour++;
					}
				}
			}
		}
		if($tour > 0){
			$mcoup = intval($tour/2);
		}
	}
	else{
		$erreur = '<p class="text-center">Aucune partie trouver</p>';
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
				<table class="table">
					<thead>
						<tr>
							<th>Statistique</th>
							<th>valeur</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Victoire</td>
							<td><?php echo $victoire; ?></td>
						</tr>
						<tr>
							<td>Defaite</td>
							<td><?php echo $defaite; ?></td>
						</tr>
						<tr>
							<td>Moyenne de coup par partie</td>
							<td><?php echo $mcoup; ?></td>
						</tr>
						<tr>
							<td>Elo</td>
							<td><?php echo $elo; ?></td>
						</tr>
					</tbody>
			    </table>
				<?php 
					if(isset($erreur)){
						echo $erreur;
					}
				?>
			</div>
		</div>
    </body>
</html>
