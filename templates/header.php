<?php 
    require_once('model/Base.php');
    $pdo = Base::GetConnexion();
    require_once('model/Title.php');
    $title = Title::GetTitle();
    require_once('model/AllUsers.php');
    $users = AllUsers::GetAllUsers();

    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="source/bootstrap-4.5.3/css/bootstrap.min.css">
        <script src="source/bootstrap-4.5.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="monStyleTemplate.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.css"/>
        <link rel="stylesheet" href="assets/css/monStyleTemplate.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
                integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" 
                crossorigin="anonymous"></script>
        <title>Café & Co</title>
    </head>
    <body>
        <?php 
            $query = "SELECT * FROM salarie";
            $statement = $pdo->prepare($query);
            $statement->execute();
            if (!isset($_SESSION['id_salarie']))
            {
                header("Location:connexion.php");
            }                       
        ?>
        <div id="acc_high">
    	    <div id="acc_intro_left">
                <div id="img_co"></div>
                <div id="profil">
                    <div id="Titre">
                    <p>
                        <?php 
                            echo '<div style="background-color: rgba(0, 0, 0, 0.05);padding-right:10%;text-align:right;">';
                            echo ucfirst($_SESSION['prenom_salarie'])." ".ucfirst($_SESSION['nom_salarie']);
                            echo '</div>';                           
                        ?>
                    </p>
                    </div>
                    <a href="deconnexion.php">
                        <button type="button" class="btn btn-secondary">Déconnexion</button>
                    </a>
                </div>
            </div>
            <div id="acc_tbd">
                <p><?php echo $title ?></p>  
            </div>
            <div id="acc_return">
                <a href="accueil.php"><button type="button" class="btn btn-secondary">Tableau de bord</button></a> 
            </div>
        </div>
        