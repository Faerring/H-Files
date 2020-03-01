<?php
include("navbar.php");

function debSquelette() { ?>
	<!DOCTYPE html>
	<html>
		<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta charset="UTF-8" lang="fr">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>H-Files</title>
			<link rel="stylesheet" type="text/css" href="../CSS/style.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="../CSS/bootstrap-tooltip-custom-class.css" media="all" />
			<link rel="shortcut icon" href="https://www.aphp.fr/sites/default/files/favico.png" type="image/png"/>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
			<script src="../JS/jquery-3.4.1.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="../JS/bootstrap-tooltip-custom-class.js"></script>
		</head>
		<body>
			<?php viewNavBar(); ?>
	<div class="container">
<?php
}

function middleDoubleDiv() { ?>
				<div id="arbo" class="row">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-search"></i></div>
								<input type="text" class="form-control" placeholder="Nom du patient">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">Recherche de patients</div>
					<div class="col-lg-offset-1 col-lg-8">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#menu1">Menu 1</a></li>
							<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
							<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
							<li><a data-toggle="tab" href="#menu4">Menu 4</a></li>
						</ul>

						<div class="tab-content">
							<div id="menu1" class="tab-pane fade in active">
								<h3>Menu 1</h3>
								<p>Some content.</p>
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
}

function middleSimpleDiv() { ?>
				<div class="row">
					<div class="col-lg-offset-1 col-lg-10">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#menu1">Menu 1</a></li>
							<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
						</ul>

						<div class="tab-content">
							<div id="menu1" class="tab-pane fade in active">
								<h3>Menu 1</h3>
								<p>Some content.</p>
							</div>
							<div id="menu2" class="tab-pane fade">
								<h3>Menu 2</h3>
								<p>Some content.</p>
							</div>
						</div>
					</div>
				</div>
<?php
}

function middleSimpleDiv2() { ?>
				<div class="row">
					<div class="col-lg-offset-1 col-lg-10">Test</div>
				</div>
<?php
}
 
function finSquelette() { ?>
			</div>
	</body>
</html>
<?php
}
?>
