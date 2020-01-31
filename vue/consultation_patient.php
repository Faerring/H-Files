<?php
include("SqueletteDePage.php");
debSquelette();
?>

<div id="arbo" class="row">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    <input type="text" class="form-control" placeholder="Nom du patient">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">Arborescence de l'APHP</div>
        <div class="col-lg-offset-1 col-lg-8">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#menu1">Données générales</a></li>
                <li><a data-toggle="tab" href="#menu2">Hospitalisation</a></li>
                <li><a data-toggle="tab" href="#menu3">Examens</a></li>
                <li><a data-toggle="tab" href="#menu4">Editer DMP</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-lg-2 photo">
                            <img class = "img_patient" src = "../img/profil_patient.jpg" alt = "Photo profil patient">
                        </div>
                        <div class="col-lg-5 infos">
                            <img class = "male_patient" src = "../img/male.png" alt = "icon male"/>
                            <p>NOM : RIBOND</p> 
                            <p>Date de naissance : 12/08/1986</p>
                            <p>Cause Hospitalisation : Ligament croisé tu connais</p>
                            <p>Département : Des mythos</p>
                        </div>
                        <div class="col-lg-5 infos2">
                            <br>
                            <p>Prénom : Maxime </p><br>
                            <p>N° Sécurité Sociale : 122201566554 </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>ANTECEDENTS</h1>

                        </div>
                    </div>
                    <div class="row">
                        <p>ADMINISTRATION</p>
                        <div class="col-lg-offset-2 col-lg-5 infos3">
                            <p>Adresse : 2 rue de la Colline</p>
                            <p>Ville : Paris</p>
                            <p>Médecin traitant : Dr Lu</p>
                        </div>
                        <div class="col-lg-5 infos4">
                            <p>Code Postal : 75013</p>
                            <p>Téléphone : 06.11.22.33.44</p>
                            <p>Personne à contacter : Juliette RIBOND</p>
                        </div>

                    </div>  

                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Some content.</p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3>Menu 4</h3>
                    <p>Some content.</p>
                </div>
            </div>
        </div>
    </div>


<?php
finSquelette();
?>
