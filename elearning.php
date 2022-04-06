<?php include('templates/header.php');
?> 
<div id="acc_low">
    <div id="acc_module">
            <div class="module_reference_elearn">
                <div class="module_low" id="Stock">
                    <div class="titre_mod_low">
                        <div class="TitreMod_vte"><p>Bibliothéque E-Learning</p></div>
                    </div>
                    <div class="container_mod_low">
                        <?php
                            $query = "SELECT * FROM elearning;";
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
        </div>
    </div>
</div>
<?php include('templates/footer.php');
?>