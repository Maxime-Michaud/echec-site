<?php
	/**
	 * Le php qui gère la connexion d'un utilisateur
	 *
	 * @author Kéven
	 */
	require 'api/UserManager.php';
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=beton395_echec;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}

	if(isset($_POST['finscription'])){
		if(!empty($_POST['username'] AND !empty($_POST['password']))){
			
			$login = htmlspecialchars($_POST['username']);
			$password = md5($_POST['password']);
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$email = htmlspecialchars($_POST['email']);
			$type_compte = 1;
			
			UserManager::add($login, $password, $nom, $prenom, $email, $type_compte);
			
		}else{
			$erreurIns = "Veuillez remplir tous les champs.";
		}
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

					</div>

				</div>

		</div>
	</div>
	</body>
</html>