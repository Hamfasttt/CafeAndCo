<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Café & Co - Modal</title>
        <meta charset="utf-8">
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
    </head>

    <body>
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
                                <input type="text" id="dte_entree" name="dte_entree" size="20">
                            </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary">Appliquer les modifications</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>