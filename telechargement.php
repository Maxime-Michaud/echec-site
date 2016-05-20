<!DOCTYPE html>
<!--
Page qui permet de télécharger l'application
-->
<?php
	mysql_connect("localhost", "root","");
	mysql_select_db("beton395_echec");
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
			<div class="col-xs-2"> <img src="Image/echecetmax.jpg" alt="Logo Echec et max" style="width:100%;height:100%;"> </div>
		</div>
		
		<div class="row green">
			<div class="col-xs-6">
				 <ul class="nav nav-pills nav-justified" role="tablist">
					<li><a href="index.php">Acceuil</a></li>
					<li><a href="client.php">Client</a></li>
					<li class="active"><a href="telechargement.php">Téléchargement</a></li>   					
				  </ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<p class="text-center"><a href="app-release-unaligned.apk" download>Télécharger l'application</a></p>
			</div>
		</div>
		<div class="row">
		</div>
    </body>
</html>
