<?php include('templates/header.php'); ?> 
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

                            if ($stocker['dte_entree'] == date("Y-m-d")) {
                                echo '<tr style="color :white; background-color :#5b59719e"><th>';
                            }
                            else{
                                echo '<tr><th>';
                            }                            
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
                                    <form method="POST" id="sendForm">
                                        <div class="ligneSaisie">
                                            <div class="ligne_texte">
                                                <label for="fk_id_produit">Produit :</label>
                                            </div>
                                            <div class="saisie_texte">
                                                <select id="fk_id_produit" name="fk_id_produit">
                                                    <?php
                                                        $query = "SELECT * FROM produit ORDER BY ref_produit DESC;";
                                                        $reponse = $pdo->prepare($query);
                                                        $reponse->execute();
                                                        while($prod = $reponse->fetch())
                                                        {
                                                            echo '<option value="'.$prod['id_produit'].'">'.$prod['ref_produit'].' - '.$prod['nom_produit'].'</option>';
                                                        }
                                                    ?>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="ligneSaisie">
                                            <div class="ligne_texte">
                                                <label for="fk_id_four">Fournisseur :</label>
                                            </div>
                                            <div class="saisie_texte">
                                                <select id="fk_id_four" name="fk_id_four">
                                                    <?php
                                                        $query = "SELECT * FROM fournisseur ORDER BY nom_four DESC;";
                                                        $reponse = $pdo->prepare($query);
                                                        $reponse->execute();
                                                        while($four = $reponse->fetch())
                                                        {
                                                            echo '<option value="'.$four['id_four'].'">'.$four['nom_four'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ligneSaisie">
                                            <div class="ligne_texte">
                                                <label for="stock_kg">Stock en Kilos :</label>
                                            </div>
                                            <div class="saisie_texte">
                                                <input type="number" id="stock_kg" name="stock_kg" step="0.01">
                                            </div>
                                        </div>
                                        <div class="ligneSaisie">
                                            <div class="ligne_texte">
                                                <label for="prix_achat">Prix d'achat :</label>
                                            </div>
                                            <div class="saisie_texte">
                                                <input type="number" id="prix_achat" name="prix_achat" >
                                            </div>
                                        </div>
                                        <div class="ligneSaisie">
                                            <div class="ligne_texte">
                                                <label for="dte_entree">Date d'entrée :</label>
                                            </div>
                                            <div class="saisie_texte">
                                                <input type="date" id="dte_entree" name="dte_entree">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button name="sendForm" type="submit" class="btn btn-primary">Appliquer les modifications</button>
                                        </div>
                                    </form>
                                    <?php
                                        if(isset($_POST['sendForm']))
                                        {
                                            $response = $pdo->query('INSERT INTO stocker (fk_id_produit, fk_id_four, stock_kg, prix_achat, dte_entree) VALUES ('.$_POST['fk_id_produit'].','.$_POST['fk_id_four'].', '.$_POST['stock_kg'].', '.$_POST['prix_achat'].', CURRENT_TIMESTAMP)');
                                        }
                                    ?>
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