<?php include('templates/header.php');
?> 
<div id="acc_low">
    <div id="acc_module">
        <div class="module_reference_elearn">
            <div class="module_low" id="Stock">
                <div class="titre_mod_low"><div class="TitreMod_vte"><p>Récapitulatif Stock :</p></div>
                </div>
                <div id="container_mod_low_stock" >
                    <?php
                        $query = "SELECT * FROM stocker INNER JOIN produit ON stocker.fk_id_produit = produit.id_produit INNER JOIN fournisseur ON stocker.fk_id_four = fournisseur.id_four ORDER BY dte_entree DESC;";
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
                                echo $stocker['ref_produit'];
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
            <div class="container mt-3" style="width: 700px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Ajouter </button>
            <div class="modal fade" id="exampleModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Ajouter un produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="titre_champ">
                            <form method="POST">
                                <div class="ligneSaisie">
                                <div class="ligne_texte">
                                    <label for="nom_produit">Nom du produit :</label>
                                </div>
                                <div class="saisie_texte">
                                    <input type="text" id="nom_produit" name="nom_produit" size="20">
                                </div>
                                </div>

                                <div class="ligneSaisie">
                                <div class="ligne_texte">
                                    <label for="qt_add">Quantité à ajouter :</label>
                                </div>
                                <div class="saisie_texte">
                                    <input type="text" id="qt_add" name="qt_add" size="20">
                                </div>
                                </div>

                               <div class="ligneSaisie">
                                <form method="POST">   
                                <div class="ligne_texte">
                                    <label for="prx_vente">Prix de vente :</label>
                                </div>
                                <div class="saisie_texte">
                                    <input type="text" id="prx_vente" name="prx_vente" size="20">
                                    (€) EUR
                                </div>
                                </div>

                                <div class="ligneSaisie">
                                <div class="ligne_texte">
                                    <label for="prx_achat">Prix d'achat :</label>
                                </div>
                                <div class="saisie_texte">
                                    <input type="text" id="prx_achat" name="prx_achat" size="20">
                                </div>
                                </div>

                                <div class="ligneSaisie">
                                <div class="ligne_texte">
                                    <label for="dte_entree">Date d'entrée :</label>
                                </div>
                                <div class="saisie_texte">
                                    <input type="date" id="dte_entree" name="dte_entree" size="20">
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button name="sendForm" type="submit" class="btn btn-primary">Appliquer les modifications</button>

                                    <?php
                                    if(isset($_POST['sendForm']))
                                    {
                                    $reponse = $pdo->query('
                                        INSERT INTO stocker (nom_produit, stock_kg, prix_kg, prix_achat, dte_entree) 
                                        INNER JOIN produit ON stocker.fk_id_produit = produit.id_produit 
                                        INNER JOIN fournisseur ON stocker.fk_id_four = fournisseur.id_four 
                                        VALUES('.$_POST['nom_produit'].', '.$_POST['qt_add'].','.$_POST['prx_vente'].', '.$_POST['prx_achat'].', '.$_POST['dte_entree'].')');
                                    }
                                    ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        </div> 
    </div>    
</div>
</div>
</div>
<?php include('templates/footer.php');
?>