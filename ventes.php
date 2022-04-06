<?php include('templates/header.php');
?> 
<div id="acc_low">
    <div id="acc_module">
        <div id="acc_module_high_vte">
            <div class="module_reference">
                <div class="module_low" id="Stock">
                    <div class="titre_mod_low_vte"><div class="TitreMod_vte"><p>Les 5 meilleures commandes</p></div>
                    </div>
                    <div class="container_mod_low" >
                    <?php
                        $query = "SELECT id_comm, num_comm, nom_client, SUM(prix_vente) AS prix_vente, dte_comm FROM produit
                                INNER JOIN contenir ON contenir.fk_id_produit = produit.id_produit
                                INNER JOIN commande on commande.id_comm = contenir.fk_id_comm
                                INNER JOIN vendre ON vendre.fk_id_comm = commande.id_comm
                                INNER JOIN client ON client.id_client = vendre.fk_id_client
                                GROUP BY id_comm, num_comm, nom_client, prix_vente, dte_comm ORDER BY prix_vente DESC LIMIT 5;";
                        $reponse = $pdo->prepare($query);
                        $reponse->execute();
                        echo '<table class="table table-striped">
                        <tr>
                        <th >Numéro Commande</th>
                        <th >Nom Client</th>
                        <th >Prix vente</th>
                        <th >Date Commande</th>
                        </tr>';
                            while($produit = $reponse->fetch())
                            {
                                echo '<tr><th>';
                                echo $produit['num_comm'];
                                echo '</th><th>';
                                echo $produit['nom_client'];
                                echo '</th><th>';
                                echo $produit['prix_vente'];
                                echo '</th><th>';
                                echo $produit['dte_comm'];
                                echo '</th></tr>';
                            }
                        echo '</table>';
                    ?>
                    </div>
                </div>
            </div>
            <div class="module_reference">
                <div class="module_low" id="Ventes">
                    <div class="titre_mod_low_vte"><div class="TitreMod_vte"><p>Les 5 produits les plus vendus</p></div>
                    </div>
                    <div class="container_mod_low">
                    <?php
                        $query ="SELECT ref_produit, nom_produit, orig_produit, prix_kg, SUM(quantite) FROM produit 
                                INNER JOIN contenir ON contenir.fk_id_produit = produit.id_produit
                                INNER JOIN commande on commande.id_comm = contenir.fk_id_comm
                                INNER JOIN vendre ON vendre.fk_id_comm = commande.id_comm
                                GROUP BY fk_id_produit, quantite ORDER BY quantite DESC LIMIT 5;";
                        $reponse = $pdo->prepare($query);
                        $reponse->execute();
                        echo '<table class="table table-striped">
                        <tr>
                        <th >Référence</th>
                        <th >Nom</th>
                        <th >Origine</th>
                        <th >Prix/kg</th>
                        <th >Quantité</th>
                        </tr>';
                            while($produit = $reponse->fetch())
                            {
                                echo '<tr><th>';
                                echo $produit['ref_produit'];
                                echo '</th><th>';
                                echo $produit['nom_produit'];
                                echo '</th><th>';
                                echo $produit['orig_produit'];
                                echo '</th><th>';
                                echo $produit['prix_kg'];
                                echo '</th><th>';
                                echo $produit['SUM(quantite)'];
                                echo '</th></tr>';
                            }
                        echo '</table>';
                    ?>
                    </div>
                </div>
            </div> 
        </div>
        <div id="acc_module_low_vte">
            <div class="module_reference">
                <div class="module_low" id="Stock">
                    <div class="titre_mod_low_vte"><div class="TitreMod_vte"><p>Vos 5 meilleures commandes</p></div>
                    </div>
                    <div class="container_mod_low" >
                    <?php
                        $query ="SELECT num_comm, nom_client, SUM(prix_vente) AS prix_vente, dte_comm FROM produit
                                INNER JOIN contenir ON contenir.fk_id_produit = produit.id_produit
                                INNER JOIN commande on commande.id_comm = contenir.fk_id_comm
                                INNER JOIN vendre ON vendre.fk_id_comm = commande.id_comm
                                INNER JOIN client ON client.id_client = vendre.fk_id_client
                                INNER JOIN salarie on salarie.id_salarie = vendre.fk_id_salarie
                                WHERE id_salarie =".$_SESSION['id_salarie']."
                                GROUP BY num_comm, nom_client, prix_vente, dte_comm ORDER BY prix_vente DESC LIMIT 5;";
                        $reponse = $pdo->prepare($query);
                        $reponse->execute();
                        echo '<table class="table table-striped">
                        <tr>
                        <th >Numéro Commande</th>
                        <th >Nom Client</th>
                        <th >Prix vente</th>
                        <th >Date Commande</th>
                        </tr>';
                            while($produit = $reponse->fetch())
                            {
                                echo '<tr><th>';
                                echo $produit['num_comm'];
                                echo '</th><th>';
                                echo $produit['nom_client'];
                                echo '</th><th>';
                                echo $produit['prix_vente'];
                                echo '</th><th>';
                                echo $produit['dte_comm'];
                                echo '</th></tr>';
                            }
                        echo '</table>';
                    ?>
                    </div>
                </div>
            </div>
            <div class="module_reference">
                <div class="module_low" id="Ventes">
                    <div class="titre_mod_low_vte"><div class="TitreMod_vte"><p>Vos 5 produits les plus vendus</p></div>
                    </div>
                    <div class="container_mod_low">
                    <?php
                        $query ="SELECT ref_produit, nom_produit, orig_produit, prix_kg, SUM(quantite) FROM produit
                                INNER JOIN contenir ON contenir.fk_id_produit = produit.id_produit
                                INNER JOIN commande on commande.id_comm = contenir.fk_id_comm
                                INNER JOIN vendre ON vendre.fk_id_comm = commande.id_comm
                                INNER JOIN salarie on salarie.id_salarie = vendre.fk_id_salarie
                                WHERE id_salarie =".$_SESSION['id_salarie']."
                                GROUP BY fk_id_produit, quantite ORDER BY quantite DESC LIMIT 5;";
                        $reponse = $pdo->prepare($query);
                        $reponse->execute();
                        echo '<table class="table table-striped">
                        <tr>
                        <th >Référence</th>
                        <th >Nom</th>
                        <th >Origine</th>
                        <th >Prix/kg</th>
                        <th >Quantité</th>
                        </tr>';
                            while($produit = $reponse->fetch())
                            {
                                echo '<tr><th>';
                                echo $produit['ref_produit'];
                                echo '</th><th>';
                                echo $produit['nom_produit'];
                                echo '</th><th>';
                                echo $produit['orig_produit'];
                                echo '</th><th>';
                                echo $produit['prix_kg'];
                                echo '</th><th>';
                                echo $produit['SUM(quantite)'];
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