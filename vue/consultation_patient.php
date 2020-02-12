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
				<li><a data-toggle="tab" href="#menu3">Constantes</a></li>
                <li><a href="../controleur/modification_dmp.php">Editer DMP</a></li>
            </ul>
			<div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-lg-2 photo">
                            <img class = "img_patient" src = "../img/profil_patient.jpg" alt = "Photo profil patient">
                        </div>
                        <div class="col-lg-5 infos">
                            <img class = "male_patient" src = "../img/male.png" alt = "icon male"/>
                            <?php
                                while ($ligne=$donneesP->fetch()){
                                    if ($ligne[6] = 'Homme' || $ligne[6] = 'Autre'){
                                        echo "<img class = 'male_patient' src = '../img/male.png' alt = 'icon male'/>";
                                    }
                                    if ($ligne[6] = 'Femme'){
                                        echo "<img class = 'female_patient' src = '../img/female.png' alt = 'icon female'/>";
                                    }
                                    echo "<li>Nom : ".$ligne[4]."</li>";
                                    echo "<li>Date de naissance : ".$ligne[7]."</li>";
                                    echo "<li>N° Carte Vitale : ".$ligne[3]."</li>";
                                    echo "<li>Département : ".$depH."</li>";
                                }
                            ?>
                            <!--p>NOM : RIBOND</p> 
                            <p>Date de naissance : 12/08/1986</p>
                            <p>Cause Hospitalisation : Ligament croisé tu connais</p>
                            <p>Département : Des mythos</p-->
                        </div>
                        <div class="col-lg-5 infos2">
                            <br>
                            <?php
                                while ($ligne=$donneesP->fetch()){
                                    echo "<li>Prénom : ".$ligne[5]."</li>";
                                    echo "<li>N° Sécurité Sociale :".$ligne[7]."</li>";
                                }
                            ?>
                            <!--p>Prénom : Maxime </p><br>
                            <p>N° Sécurité Sociale : 122201566554</p-->
						</div>
                    </div>
					<div class="row">
                        <h2>ANTECEDENTS</h2>
                            <div class="col-lg-4 tabAntecedentMedicaux">
                                <table class="tabAntecedentMedicaux">
                                    <thead>
                                        <tr>
                                            <th scope="col">Antécédents médicaux</th>
                                            <!--th scope="col">Antécédents chirurgicaux</th>
                                            <th scope="col">Allergies</th-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($ligne=$a_medicaux->fetch()) {
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $a_medicaux;
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4 tabAntecedentChirurgicaux">
                                <table class="tabAntecedentChirurgicaux">
                                    <thead>
                                        <tr>
                                            <th scope="col">Antécédents chirurgicaux</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($ligne=$a_chirurgicaux->fetch()) {
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $a_chirurgicaux;
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4 tabAllergies">   
                                <table class="tabAllergies">
                                    <thead>
                                        <tr>
                                            <th scope="col">Allergies</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($ligne=$$allergies->fetch()) {
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $$allergies;
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="row">
                        <h2>ADMINISTRATION</h2>
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
                    <?php 
                    if(!isset($_POST['hosp'])) {
						unset($_POST['hosp']);
                    ?>
                    <h3>Hospitalisation</h3>
                    <form action="../vue/consultation_patient.php" method="post">
						<div class="row hosp">
							<?php /*
								while($ligne=$hospitalisation->fetch()) {
									echo '<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="'.$ligne[0].'"><i class="fas fa-folder-open"></i></a></div>';
								}*/
							?>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="hosp" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
						</div>
					</form>
					<?php 	
					}
					else {
						unset($_POST['hosp']);
						?>
                    <h3>Actes <a style="background-color:transparent; text-decoration:none" href="../vue/consultation_patient.php">&#8617;</a></h3>
                    <form action="../vue/consultation_actes.php" method="post">
						<div class="row hosp">
							<?php /*
								while($ligne=$actes->fetch()) {
									echo '<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="'.$ligne[0].'"><i class="fas fa-folder-open"></i></a></div>';
								}*/
							?>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
							<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="a"><i class="fas fa-folder-open"></i></a></div>
						</div>
					</form>
					<?php
					}
					?>
                </div>
				<div id="menu3" class="tab-pane fade" style="padding:0 20px">
					<div class="row">
						<p>Editer les constantes</p>
						<div class="const">
							<p><?php echo date("j/n/Y");?></p>  
							<p>Heure de prise</p>  
							<p><?php echo $const[0]; ?></p>
						</div>
					</div>
					<hr style="margin-left: -20px;">
					<div class="row">
						<div class="const">
							<p>Fréquence cardiaque : <?php echo $const[1] ?></p>
							<p>Saturation : <?php echo $const[2]; ?></p>
						</div>
						<div class="const"><p>Tension artérielle : <?php echo $const[3] ?></p>  <p>Température : <?php echo $const[4] ?></p></div>
						<p>Observation <?php echo $const[5]; ?></p>
					</div>
				</div>
			</div>
        </div>
    </div>

<?php
finSquelette();
?>
