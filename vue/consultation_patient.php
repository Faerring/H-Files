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
                            <?php
									$donneesP = $donneesP->fetch();
                                    if ($donneesP[5] == 'Homme' || $donneesP[5] == 'Autre'){
                                        echo "<img class = 'male_patient' src = '../img/male.png' alt = 'icon male'/>";
                                    }
                                    else {
                                        echo "<img class = 'female_patient' src = '../img/female.png' alt = 'icon female'/>";
                                    }
                                    echo "<li>Nom : ".$donneesP[3]."</li>";
                                    echo "<li>Date de naissance : ".$donneesP[6]."</li>";
                                    echo "<li>Département : ".$depH->fetch()[0]."</li>";

                            ?>
                           
                        </div>
                        <div class="col-lg-5 infos2">
                            <br>
                            <?php
                                    echo "<li>Prénom : ".$donneesP[4]."</li>";
                                    echo "<li>N° Sécurité Sociale : ".$donneesP[1]."</li>";
                            ?>
						</div>
                    </div>
					<div class="row">
                        <h2>ANTECEDENTS</h2>
                            <div class="col-lg-4 tabAntecedent">
                                <table class="tabAntecedent">
                                    <thead>
                                        <tr>
                                            <th scope="col">Antécédents médicaux</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($ligne=$a_medicaux->fetch()) {
                                                echo "<tr>";
                                                echo "<td>";
                                                echo utf8_encode($ligne[0]);
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4 tabAntecedent">
                                <table class="tabAntecedent">
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
                                                echo utf8_encode($ligne[0]);
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4 tabAntecedent">   
                                <table class="tabAntecedent">
                                    <thead>
                                        <tr>
                                            <th scope="col">Allergies</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($ligne=$allergies->fetch()) {
                                                echo "<tr>";
                                                echo "<td>";
                                                echo utf8_encode($ligne[0]);
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
                            <?php 
                                    echo "<li>Adresse : ".$donneesP[7]."</li>";
                                    echo "<li>Lieu de naissance: ".$donneesP[8]."</li>";
                                    echo "<li>Médecin traitant : ".$MedecinTraitant->fetch()[0]."</li>";
                            ?>

                        </div>
                        <div class="col-lg-5 infos4">
                            <?php 
                                    echo "<li>Téléphone : ".$donneesP[9]."</li>";
                                    echo "<li>N° Sécurité sociale du Responsable légal : ".$donneesP[2]."</li>";
                                    echo "<li>N° de téléphone du Responsable légal : ".$donneesP[12]."</li>";
                            ?>

                        </div>
                    </div>  
                </div>
                <div id="menu2" class="tab-pane fade">
                    <?php 
                    if(!isset($_POST['hosp'])) {
						unset($_POST['hosp']);
                    ?>
                    <h3>Hospitalisation</h3>
                    <form action="../controleur/consultation_patient.php" method="post">
						<div class="row hosp">
							<?php 
								while($ligne=$hospitalisation->fetch()) {
									echo '<div class="col-lg-3 col-md-6"><p>blabla</p><button name="hosp" type="submit" value="'.$ligne[0].'"><i class="fas fa-folder-open"></i></a></div>';
								}
							?>
						</div>
					</form>
					<?php 	
					}
					else {
						unset($_POST['hosp']);
						?>
                    <h3>Actes <a style="background-color:transparent; text-decoration:none" href="../controleur/consultation_patient.php">&#8617;</a></h3>
                    <form action="../controleur/consultation_actes.php" method="post">
						<div class="row hosp">
							<?php 
								while($ligne=$actes->fetch()) {
									echo '<div class="col-lg-3 col-md-6"><p>test</p><button name="acte" type="submit" value="'.$ligne[0].'"><i class="fas fa-folder-open"></i></a></div>';
								}
							?>
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
