<?php include('templates/header.php');
?> 
<div id="acc_low">
    <div id="acc_module">
        <div class="module_reference_elearn">
            <div class="module_low" id="Stock">
                <div class="titre_mod_low"><div class="TitreMod_vte"><p>Contact vendeurs et performances</p></div>
                </div>
                    <div class="container_mod_low" >
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
    </div>
</div>
<?php include('templates/footer.php');
?>