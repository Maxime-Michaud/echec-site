<!DOCTYPE html>
<!--
Page qui s'affiche quand l'utilisateur est connecter
-->
<?php
	/**
	 * Le php qui affiche que l'utilisateur est connecté
	 *
	 * @author Kéven
	 */
	session_start();
	require 'api/UserManager.php';
	mysql_connect("localhost", "root","");
	mysql_select_db("beton395_echec");
	
	if(isset($_GET['id'])){
		$getId = intval($_GET['id']);
		$user = UserManager::get($getId);
	}else{
		header("Location: connexion.php");
		$erreur = "Un probème de connection est survenu!";
	}
?>
<html>  
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<div class="container">
		<div align = "center">
				<div  style = "border: solid 1px #333333; " align = "left">

					<div style = "margin:30px">
						<?php
						if(isset($_GET['id'])){
							echo "Bonjour ".$user['prenom']." ".$user['nom']. '<br>';
							if(isset($error)){
								echo $erreur;
							}
						}
						?>
						<a href="statistique.php">Statistique</a></br>
						<a href="hpartie.php">Historique des parties</a>
					</div>
		
				</div>

		</div>
	</div>
	</body>
</html>