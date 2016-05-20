<!DOCTYPE html>
<!--
Page qui permet à l'utilisateur de se s'inscrire
-->
<?php
	/**
	 * Le php qui gère l'inscription d'un utilisateur
	 *
	 * @author Kéven
	 */
	session_start();
	require 'api/UserManager.php';
	mysql_connect("localhost", "root","");
	mysql_select_db("beton395_echec");

	if(isset($_POST['finscription'])){
		if(!empty($_POST['username']) AND !empty($_POST['password'])
			AND !empty($_POST['nom'])AND !empty($_POST['prenom'])
			AND !empty($_POST['email'])){
			
			$login = htmlspecialchars($_POST['username']);
			$password = md5($_POST['password']);
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$email = htmlspecialchars($_POST['email']);
			$type_compte = 1;
			
			UserManager::add(null, $login, $password, $nom, $prenom, $email, $type_compte);
			echo mysql_error();
			if(UserManager::authentifier($login, $password) == false){
				echo mysql_error();
			}
			else{
				$userId = UserManager::authentifier($login, $password);
				$user = UserManager::get($userId);
				$_SESSION['id'] = $user['id'];
				header("Location: profil.php?id=".$_SESSION['id']);
			};
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

						<form action = "" method = "post">
							<label>Prenom  :</label><input type = "text" name = "prenom" class = "box"/><br />
							<label>Nom  :</label><input type = "text" name = "nom" class = "box"/><br />
							<label>Nom d'utilisateur  :</label><input type = "text" name = "username" class = "box"/><br />
							<label>Mot de passe  :</label><input type = "password" name = "password" class = "box" /><br/>
							<label>Courriel :</label><input type = "email" name = "email" class = "box"/><br />
							<input type = "submit" name = "finscription" value = "S'inscrire"/><br />
						</form>
						<?php
							if(isset($erreurIns)){
								echo '<font color="red">'.$erreurIns.'</font>';
							}
						?>
						<a href="connexion.php">Se connecté</a>
					</div>

				</div>

		</div>
	</div>
	</body>
</html>