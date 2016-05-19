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

	if(isset($_POST['fconnexion'])){
		if(!empty($_POST['username'] AND !empty($_POST['password']))){
			
			$login = htmlspecialchars($_POST['username']);
			$password = md5($_POST['password']);
			
			if(UserManager::authentifier($login, $password) == false){
				echo "Marche pas";
			}
			else{
				echo "fonctionne";
			};
		}else{
			$erreurCo = "Veuillez remplir tous les champs.";
		}
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
	  
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#m1">Connection</a></li>
			<li><a data-toggle="tab" href="#m2">Inscription</a></li>
		</ul>

		<div class="tab-content">
			<div id="m1" class="tab-pane fade in active">
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
							</div>

						</div>

				</div>
			</div>
			<div id="m2" class="tab-pane fade">
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
							</div>

						</div>

				</div>
			</div>
		</div>
	</div>
	</body>
</html>