<?php require_once('model/Base.php');
  $pdo = Base::GetConnexion();
?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="source/bootstrap-4.5.3/css/bootstrap.min.css">
        <script src="source/bootstrap-4.5.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="connexion.css">
		<title> Espace de connexion - Café and Co. </title>
	</head>

	<body> 
		<div id="container">
			<div id="login">
				<form method="POST">
					<div id="img_logo_login">
						<img src="images\logo.png">
					</div>
					<p> Adresse e-mail : <input type = "text" name = "mail"/></p>
					<p> Mot de passe : <input type = "password" name = "mdp"/></p>
					<tr>
					<p><input type = "submit" value = "Connexion" id="button" /></p>
				</form>
				<div id="php">
				<?php
		            if(isset($_POST['mdp'])&& isset($_POST['mail']))
		            {
		                try
		                {
		                    $query = "SELECT * FROM salarie WHERE mail_salarie='".$_POST['mail']."' AND mdp_salarie='".$_POST['mdp']."' LIMIT 1;";
		                    $statement = $pdo->prepare($query);
		                    $statement->execute();
		                    $row = $statement->fetch();
		                    if ($row == FALSE) {
		                        echo '<div class="alert alert-danger" role="alert">'."Impossible de vous connecter. Erreur d'identifiants.".'</div>';
		                    }
		                    else {
		                        header("Location:accueil.php?nom=".$row['nom_salarie']."&prenom=".$row['prenom_salarie']);
		                        $_SESSION['prenom_salarie'] = $row['prenom_salarie'];
		                        $_SESSION['nom_salarie'] = $row['nom_salarie'];
		                        $_SESSION['id_salarie'] = $row['id_salarie'];
		                        $_SESSION['mail_salarie'] = $row['mail_salarie'];
		                    }
		                }
		                catch(Exception $ex)
		                {
		                    echo "erreur de connexion : ",$ex;
		                }
		            }
		        ?>
				</div>
			</div>
		</div>
	</body>
</html>