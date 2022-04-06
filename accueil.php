<?php include('templates/header.php');
?>    
<div id="acc_low">
    <div id="acc_module">
        <div id="acc_module_high">
            <div class="module_reference">
                <div id="acc_mod_elearn" class="module_high" id="elearn">
                    <div class="titre_mod_high_tbd"><div class="TitreMod"><p>E-Learning</p></div>
                        <a class="a_btn_high" href="elearning.php"><button type="button" class="btn btn-outline-light">Plus d'infos</button> </a> 
                    </div> 
                    <div class="container_mod_low_h">
                        <?php
                            $query = "SELECT * FROM elearning ORDER BY note_learn DESC LIMIT 3;";
                            $reponse = $pdo->prepare($query);
                            $reponse->execute();
                            echo '<table class="table table-striped">
                            <tr>
                            <th id = "th_titre">Nom</th>
                            <th id = "th_titre">Durée</th>
                            <th id = "th_titre">Note/10</th>
                            </tr>';
                                while($elearning = $reponse->fetch())
                                {
                                    echo '<tr><th>';
                                    echo $elearning['nom_doc_learn'];
                                    echo '</th><th>';
                                    echo $elearning['duree_learn'];
                                    echo '</th><th>';
                                    echo $elearning['note_learn'];
                                    echo '</th></tr>';
                                }
                            echo '</table>';
                        ?>    
                    </div>                
                </div>
            </div>
            <div class="module_reference">
                    <div id="acc_mod_MonProfil" class="module_high" id="MonProfil">
                        <div class="titre_mod_high_tbd"><div class="TitreMod"><p>Mon Profil</p></div>
                            <a class="a_btn_high" href="profil.php"><button type="button" class="btn btn-outline-light" >Plus d'infos</button></a>
                        </div>
                        <div class="container_mod_low_h" >
                        <?php
                            $query = "SELECT * FROM salarie WHERE id_salarie = ".$_SESSION['id_salarie']."";
                            $reponse = $pdo->prepare($query);
                            $reponse->execute();
                            while($salarie = $reponse->fetch())
                            {
                                ?>
                                <div id="array_tbd">
                                <?php
                                    echo '<table class="table table-striped">';
                                    echo '<tr><th></br>';
                                    echo "Nom: ".$salarie['nom_salarie'];
                                    echo '</th></tr><tr><th></br>';
                                    echo "Prénom: ".$salarie['prenom_salarie'];
                                    echo '</th></tr><tr><th></br>';
                                    echo "Mail: ".$salarie['mail_salarie'];
                                    echo '</th></tr><tr></tr>';
                                    $_SESSION['nom_salarie']=$salarie['nom_salarie'];
                                    $_SESSION['mdp_salarie']=$salarie['mdp_salarie'];
                                    $_SESSION['mail_salarie']=$salarie['mail_salarie'];
                                    $_SESSION['id_salarie']=$salarie['id_salarie'];
                                    }
                                echo '</table>';
                            ?>
                                </div>
                        </div>
                    </div>
                </div>
            <div class="module_reference">
                <div class="module_high" id="Vendeurs">
                    <div id="acc_mod_Vendeurs" class="titre_mod_high_tbd"><div class="TitreMod"><p>Vendeurs</p></div>
                        <a class="a_btn_high" href="vendeurs.php"><button type="button" class="btn btn-outline-light">Plus d'infos</button></a>
                    </div>
                    <div class="container_mod_low_h" >
                        <?php
                            $query = " SELECT nom_salarie, prenom_salarie, mail_salarie, libelle FROM salarie 
                                    INNER JOIN role ON role.id_role = salarie.fk_id_role ;";
                            $reponse = $pdo->prepare($query);
                            $reponse->execute();
                            echo '<table class="table table-striped">
                            <tr>
                            <th >Nom</th>
                            <th >Prénom</th>
                            <th >Mail</th>
                            <th >Poste</th>
                            </tr>';
                                while($produit = $reponse->fetch())
                                {
                                    echo '<tr><th>';
                                    echo $produit['nom_salarie'];
                                    echo '</th><th>';
                                    echo $produit['prenom_salarie'];
                                    echo '</th><th>';
                                    echo $produit['mail_salarie'];
                                    echo '</th><th>';
                                    echo $produit['libelle'];
                                    echo '</th></tr>';
                                }
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="acc_module_low">
            <div class="module_reference">
                <div class="module_low" id="Stock">
                    <div class="titre_mod_low_tbd"><div class="TitreMod"><p>Stock</p></div>
                        <a class="a_btn_low" href="stock.php">
                            <button type="button" class="btn btn-outline-light btn_low">Plus d'infos</button>
                        </a>
                    </div>
                    <div class="container_mod_low_l" >
                        <?php
                            $query = "SELECT * FROM stocker INNER JOIN produit ON stocker.fk_id_produit = produit.id_produit INNER JOIN fournisseur ON stocker.fk_id_four = fournisseur.id_four ORDER BY dte_entree DESC LIMIT 3;";
                            $reponse = $pdo->prepare($query);
                            $reponse->execute();
                            echo '<table class="table table-striped">
                            <tr>
                            <th >Réference</th>
                            <th >Nom</th>
                            <th >Origine</th>
                            <th >€/kg</th>
                            <th >Stock/kg</th>
                            <th >Prix achat</th>
                            <th >Date entrée stock</th>
                            <th >Fournisseur</th>
                            </tr>';
                                while($stocker = $reponse->fetch())
                                {
                                    echo '<tr><th>';
                                    echo $stocker['id_produit'];
                                    echo '</th><th>';
                                    echo $stocker['nom_produit'];
                                    echo '</th><th>';
                                    echo $stocker['orig_produit'];
                                    echo '</th><th>';
                                    echo $stocker['prix_kg'];
                                    echo '</th><th>';
                                    echo $stocker['stock_kg'];
                                    echo '</th><th>';
                                    echo $stocker['prix_achat'];
                                    echo '</th><th>';
                                    echo $stocker['dte_entree'];
                                    echo '</th><th>';
                                    echo $stocker['nom_four'];
                                    echo '</th></tr>';
                                }
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="module_reference">
                <div class="module_low" id="Ventes">
                    <div class="titre_mod_low_tbd"><div class="TitreMod" href="ventes.html"><p>Ventes</p></div>
                        <a class="a_btn_low" href="ventes.php"><button type="button" class="btn btn-outline-light btn_low">Plus d'infos</button></a>
                    </div>
                    <div class="container_mod_low_l" >
                    <?php
                        $query = "SELECT nom_salarie, prenom_salarie, COUNT(id_comm) AS id_comm, SUM(prix_vente) AS prix_vente FROM salarie
                                    INNER JOIN vendre ON vendre.fk_id_salarie = salarie.id_salarie
                                    INNER JOIN commande ON commande.id_comm = vendre.fk_id_comm
                                    INNER JOIN contenir ON contenir.fk_id_comm = commande.id_comm
                                    INNER JOIN produit ON produit.id_produit = contenir.fk_id_produit
                                    WHERE MONTH(dte_comm) = MONTH(CURRENT_DATE())
                                    GROUP BY nom_salarie, prenom_salarie, id_comm, prix_vente
                                    ORDER BY prix_vente DESC;";
                                    $reponse = $pdo->prepare($query);
                                    $reponse->execute();
                                    echo '<table class="table table-striped">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Nombre Commandes</th>
                                        <th>Total Vente</th>
                                        </tr>';

                            while($salarie = $reponse->fetch())
                            {
                                echo '<tr><th>';
                                echo $salarie['nom_salarie'];
                                echo '</th><th>';
                                echo $salarie['prenom_salarie'];
                                echo '</th><th>';
                                echo $salarie['id_comm'];
                                echo '</th><th>';
                                echo $salarie['prix_vente'];
                                echo '</th></tr>';
                            }
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('templates/footer.php');
?>   