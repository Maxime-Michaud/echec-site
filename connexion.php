<!DOCTYPE html>
<!--
Page qui permet à l'utilisateur de se connecter
-->
<?php
	/**
	 * Le php qui gère la connexion d'un utilisateur
	 *
	 * @author Kéven
	 */
	session_start();
	require 'api/UserManager.php';
	mysql_connect("localhost", "root","");
	mysql_select_db("beton395_echec");

	if(isset($_POST['fconnexion'])){
		if(!empty($_POST['username'] AND !empty($_POST['password']))){
			
			$login = htmlspecialchars($_POST['username']);
			$password = md5($_POST['password']);
			
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
			$erreurCo = "Veuillez remplir tous les champs.";
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
						  <label>Nom d'utilisateur  :</label><input type = "text" name = "username" class = "box"/><br/>
						  <label>Mot de passe  :</label><input type = "password" name = "password" class = "box" /><br/>
						  <input type = "submit" name = "fconnexion" value = "Se connecter"/><br/>
						</form>
						<?php
							if(isset($erreurCo)){
								echo '<font color="red">'.$erreurCo.'</font>';
							}
						?>
						<a href="inscription.php">Créer un compte</a>
					</div>

				</div>

		</div>
	</div>
	</body>
</html>