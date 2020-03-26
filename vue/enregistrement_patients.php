<?php
require_once("SqueletteDePage.php");
debSquelette();
?>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <form method="post" action="../controleur/enregistrement_patients.php" autocomplete="off">
                <div class="form-group">
                    <label for="SocialSecurityNumber">numéro de sécurité social</label>
                    <input type="text" class="form-control" name="SocialSecurityNumber" id="SocialSecurityNumber"
                           pattern="[0-9]{15}" placeholder="0 00 00 00 000 000 00" required="">
                </div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
<?php
if (isset($idFound)) {
    ?>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10" id="newpatient">
            <?php
            if ($idFound[2] == null) {
                ?>
                <p> aucun patient trouver, création d'un nouveau dossier :</p><br/>
                <form>
                    <div class="form-group">
                        <label for="UUID">UUID</label>
                        <input type="text" class="form-control" id="UUID" placeholder="Entrer UUID">
                    </div>
                    <div class="form-group">
                        <label for="NSS">Numéro de sécurité social</label>
                        <input type="text" pattern="[0-9]{15}" required="required" class="form-control" id="NSS"
                               placeholder="Entrer Numéro de sécurité social">
                    </div>
                    <div class="form-group">
                        <label for="NSSRepLegal">Numéro de sécurité social du résponsable légale</label>
                        <input type="text" pattern="[0-9]{15}" class="form-control nullable" data-toggle="tooltip"
                               data-placement="top" data-custom-class="tooltip-primary" id="NSSRepLegal"
                               placeholder="Entrer Numéro de sécurité social du résponsable légale"
                               required="required">
                    </div>
                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" class="form-control nullable" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary" id="Nom" placeholder="Entrer le Nom">
                    </div>
                    <div class="form-group">
                        <label for="Prenom">Prénom</label>
                        <input type="text" class="form-control nullable" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary" id="Prenom" placeholder="Enter le Prénom">
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select class="form-control" id="sexe" required="required">
                            <option value="" disabled selected>Selectionner le sexe</option>
                            <option>Homme</option>
                            <option>Femme</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="DateDeNaissance">Date De Naissance</label>
                        <input type="date" class="form-control nullable" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary" id="DateDeNaissance"
                               placeholder="Entrer Date De Naissance">
                    </div>
                    <div class="form-group">
                        <label for="Adresse">Adresse</label>
                        <input type="text" class="form-control nullable" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary" id="Adresse" placeholder="Entrer une adresse">
                    </div>
                    <div class="form-group">
                        <label for="lieuNaissance">Lieu de naissance</label>
                        <input type="text" class="form-control nullable" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary" id="lieuNaissance"
                               placeholder="Entrer le lieu de naissance">
                    </div>
                    <div class="form-group">
                        <label for="telephone">numéro de téléphone</label>
                        <input type="tel" class="form-control nullable" data-toggle="tooltip" data-placement="top"
                               data-custom-class="tooltip-primary"
                               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" id="telephone"
                               placeholder="Entrer numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <label for="IDNoeud">Noeud</label>
                        <select class="form-control" id="IDNoeud" required="required">
                            <option value="" disabled selected>Selectionner le noeud</option>
                            <?php
                            if (isset($nodes)) {
                                while ($node = $nodes->fetch()) {
                                    echo '<option>' . $node[0] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="IDMedTraitant">Medecin Traitant</label>
                        <select class="form-control nullable" data-toggle="tooltip" data-placement="top"
                                data-custom-class="tooltip-primary" id="IDMedTraitant">
                            <option value="" disabled selected>Selectionner le Medecin Traitant</option>
                            <?php
                            if (isset($meds)) {
                                while ($med = $meds->fetch()) {
                                    echo '<option>' . $med[0] . ' Nom :' . $med[1] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Créé le dossier</button>
                    <button type="reset" id="cancel" class="btn btn-secondary">Annuler la création de dossier</button>
                    <script type="text/javascript">
                        document.getElementById("cancel").onclick = function () {
                            location.href = "../vue/enregistrement_patients.php";
                        };
                    </script>
                </form>

                <?php


            } else {
                ?>
                <p> un patient trouver :</p><br/>
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-auto" style="display: inline-block;">
                            <?php
                            echo '<p>' . $idFound[0] . ' ' . $idFound[1] . ' -->' . $idFound[2] . '</p>';
                            $_SESSION['nom'] = $idFound[0];
                            $_SESSION['prenom'] = $idFound[1];
                            $_SESSION['UUID'] = $idFound[2];
                            ?>
                            <form method="post">
                                <input type="submit" name="AjouterHospitalisation" class="btn btn-primary btn"
                                       value="Ajouter une hospitalisation"/>

                                <input type="submit" name="ConsultPatient" class="btn btn-info btn"
                                       value="Consulter le Dossier Du Patient"/>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
} else if (isset($AjouterHospitalisation)) {
if ($nom != '' && $prenom != '' && $UUID != ''){
if (isset($hospitalisation)){
    echo '<p> une demande d\'hospitalisation a été effectuée pour ' . $nom . ' ' . $prenom . ' ( ' . $UUID . ' ) date de début ' . $beginDate . ' date de fin ' . $x . '</p>';
}else{
    ?>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10" id="newpatient">
            <?php
            echo '<p>Ajout d\'une hospitalisation pour ' . $nom . ' ' . $prenom . ' ( ' . $UUID . ' )</p><br />';
            ?>
            <form method="post">
                <input type="hidden" name="hospitalisation" id="hospitalisation" value="1">
                <input type="hidden" name="AjouterHospitalisation" id="AjouterHospitalisation" value="1">
                <label for="beginDate">Date de début de l'hospitalisation</label>
                <input type="date" name="beginDate" class="form-control" id="beginDate" placeholder="">

                <label for="finishDate">Date de sortit de l'hospitalisation</label>
                <input type="date" class="form-control nullable" name="finishDate" required="required" id="finishDate"
                       placeholder="">

                <button type="submit" class="btn btn-primary">Créer l'hospitalisation</button>
                <button type="reset" id="cancelHosp" class="btn btn-secondary">Annuler la création de
                    l'Hospitalisation
                </button>
                <script type="text/javascript">
                    document.getElementById("cancelHosp").onclick = function () {
                        var r = confirm('cette action vous forcera a renvoyer le formulaire \n vous serrez inviter a recherger la page et a renvoyer le formulaire en appuyant sur ok');
                        if (r === true) {
                            history.back();
                        }
                    };
                </script>
            </form>
            <?php
            }
            }
            }
            ?>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $(".nullable")
                .tooltip({'trigger': 'focus', 'title': 'laisser vide si besoin', 'animation': 'true'});
        });
    </script>
<?php
finSquelette();
?>