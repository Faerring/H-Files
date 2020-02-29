<?php
include("SqueletteDePage.php");
debSquelette();
?>
<div class="row">
	<div class="col-lg-offset-1 col-lg-10">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#menu1">Consulter les entrées et sorties</a></li>
			<li><a data-toggle="tab" href="#menu2">Ajouter ou modifier une affectation</a></li>
		</ul>

		<div class="tab-content">
			<div id="menu1" class="tab-pane fade in active tableaux">
				<h3>Entrées patients</h3>
				<table class="tabES">
					<tr>
						<td>Nom</td>
						<td>Prénom</td>
						<td>Date</td>
						<td>Médecin traitant</td>
					</tr>
					<?php
					while($ligne=$entrees->fetch()) {
						echo "<tr>";
						echo "<td>";
						echo $ligne[0];
						echo "</td>";
						echo "<td>";
						echo $ligne[1];
						echo "</td>";
						echo "<td>";
						echo $ligne[2];
						echo "</td>";
						echo "<td>";
						echo $ligne[3];
						echo "</td>";
						echo "</tr>";
					}?>
				</table>
				<br>
				<h3>Sorties patients</h3>
				<table class="tabES">
					<tr>
						<td>Nom</td>
						<td>Prénom</td>
						<td>Date</td>
						<td>Médecin traitant</td>
					</tr>
					<?php
					while($ligne2=$sorties->fetch()) {
						echo "<tr>";
						echo "<td>";
						echo $ligne2[0];
						echo "</td>";
						echo "<td>";
						echo $ligne2[1];
						echo "</td>";
						echo "<td>";
						echo $ligne2[2];
						echo "</td>";
						echo "<td>";
						echo $ligne2[3];
						echo "</td>";
						echo "</tr>";
					}?>
				</table>
				<br>
			</div>
			
			<div id="menu2" class="tab-pane fade modif">
				<div class="col-lg-6" id="add">
					<h3>Ajouter une nouvelle affectation :</h3>
					<form method="POST" action="entrees_sorties.php">
						<p>
							<label class="labES">Nom du patient :</label>
							<input type="text" name="nom"/>
						</p>
						<p>
							<label class="labES">Prénom du patient :</label>
							<input type="text" name="prenom"/>
						</p>
						<p>
							<label class="labES">Date d'affectation :</label>
							<input type="date" name="date"/>
						</p>
						<input type="submit" name="confirmerA">
						<br>
						<br>
					</form>
				</div>
				<div class="col-lg-6" id="modify">
					<h3>Modifier une affectation :</h3>
					<form method="POST" action="entrees_sorties.php">
						<p>
							<label class="labES">Nom du patient :</label>
							<input type="text" name="nom"/>
						</p>
						<p>
							<label class="labES">Prénom du patient :</label>
							<input type="text" name="prenom"/>
						</p>
						<p>
							<label class="labES">Date de fin d'affectation :</label>
							<input type="date" name="date"/>
						</p>
						<input type="submit" name="confirmerM">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
finSquelette();
?>
