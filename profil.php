<?php include('templates/header.php');
?> 
<div id="acc_low">
    <div id="acc_module">
        <div class="module_low" id="Stock">
            <div class="titre_mod_low">
                <div class="TitreMod_vte"><p>Données Personnelles</p></div>
            </div>
            <div id="mod_low_prof">
                <?php
                    $query = "SELECT * FROM salarie WHERE id_salarie = ".$_SESSION['id_salarie']."";
                    $reponse = $pdo->prepare($query);
                    $reponse->execute();
                    while($salarie = $reponse->fetch())
                    {
                ?>
                <div id="image">
                    <img src="data:image/png;base64,<?php  echo base64_encode($salarie["Image"]);?>" width="168" height="225" />
                </div>
                <div id="array">
                    <?php
                        echo '<table class="table table-striped">';
                        echo '<tr><th></br>';
                        echo "Nom: ".$salarie['nom_salarie'];
                        echo '</th></tr><tr><th></br>';
                        echo "Prénom: ".$salarie['prenom_salarie'];
                        echo '</th></tr><tr><th></br>';
                        echo "Mail: ".$salarie['mail_salarie'];
                        echo '</th></tr><tr><th></br>';
                        echo "Mot de passe: *********";
                        echo '</th></tr><tr></tr>';
                        $_SESSION['nom_salarie']=$salarie['nom_salarie'];
                        $_SESSION['mdp_salarie']=$salarie['mdp_salarie'];
                        $_SESSION['mail_salarie']=$salarie['mail_salarie'];
                        $_SESSION['id_salarie']=$salarie['id_salarie'];
                        }
                        echo '</table>';
                    ?>
                </div>
                <div id="button_action">        
                    <form method="POST">
                        <div class="container mt-3" style="width: 100%;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Modifier Nom</button>
                            <div class="modal fade" id="exampleModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Modifier Nom</h5>                 
                                        </div>
                                        <div class="modal-body">
                                            <div class="titre_champ">                                
                                                <div class="ligneSaisie">
                                                    <label for="nom_produit">Modifier nom:</label>
                                                    <input type="text" id="nom_salarie" name="nom_salarie" size="50">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="sendForm" class="btn btn-primary" >Appliquer les modifications</button>         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['sendForm']))
                        {
                            $reponse = $pdo->query('UPDATE salarie SET nom_salarie="'.$_POST['nom_salarie'].'" WHERE id_salarie = "'.$_SESSION['id_salarie'].'"');
                        }
                    ?>
                    <form method="POST">
                        <div class="container mt-3" style="width: 100%;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Modifier Prénom</button>
                            <div class="modal fade" id="exampleModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Modifier Prénom</h5>                 
                                        </div>
                                        <div class="modal-body">
                                            <div class="titre_champ">                                
                                                <div class="ligneSaisie">
                                                    <label for="nom_produit">Modifier Prénom:</label>
                                                    <input type="text" id="nom_salarie" name="nom_salarie" size="50">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="sendForm" class="btn btn-primary" >Appliquer les modifications</button>         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['sendForm']))
                        {
                            $reponse = $pdo->query('UPDATE salarie SET prenom_salarie="'.$_POST['prenom_salarie'].'" WHERE id_salarie = "'.$_SESSION['id_salarie'].'"');
                        }
                    ?>
                    <form method="POST">
                        <div class="container mt-3" style="width: 100%;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal0"> Modifier Mail</button>
                            <div class="modal fade" id="exampleModal0">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Modifier Mail</h5>                 
                                        </div>
                                        <div class="modal-body">
                                            <div class="titre_champ">                                
                                                <div class="ligneSaisie">
                                                    <label for="nom_produit">Modifier Mail:</label>
                                                    <input type="text" id="mail_salarie" name="mail_salarie" size="50">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="sendForm0" class="btn btn-primary" >Appliquer les modifications</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['sendForm0']))
                        {
                            $reponse = $pdo->query('UPDATE salarie SET mail_salarie="'.$_POST['mail_salarie'].'" WHERE id_salarie = "'.$_SESSION['id_salarie'].'"');
                        }
                    ?>
                    <form method="POST">
                        <div class="container mt-3" style="width: 100%;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1"> Modifier Mot de Passe</button>
                            <div class="modal fade" id="exampleModal1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Modifier mot de passe</h5>                 
                                        </div>
                                        <div class="modal-body">
                                            <div class="titre_champ">                                
                                                <div class="ligneSaisie">
                                                    <label for="nom_produit">Modifier mot de passe:</label>
                                                    <input type="text" id="mdp_salarie" name="mdp_salarie" size="50">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" name="sendForm1" class="btn btn-primary" >Appliquer les modifications</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['sendForm1']))
                        {
                            $reponse = $pdo->query('UPDATE salarie SET mdp_salarie="'.$_POST['mdp_salarie'].'" WHERE id_salarie = "'.$_SESSION['id_salarie'].'"');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('templates/footer.php');
?>