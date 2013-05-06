<!doctype html>
<html lang="en">
<div style="background-image:url(images/1.png) no-repeat; float-left;">
<head>
	<meta charset="UTF-8" />
	<title>Site Administration CL</title>
	<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<div class="header_global" style="background:fixed;">
  		<div class="header_second">
    		<a href="index.html" id="dev7link" title="Go to Home"></a>
  		</div>
	</div>
					
</head>

<body>
<div id="wrapper"><!-- #wrapper -->

	<header><!-- header -->
		<div id="headerlogo"><img src="images/logo.png" alt="" /></div>
		<h1><a style="color:black;" href="#">Administration CL</a></h1>
		<h2><br/></h2>
	</header><!-- end of header -->
	
	<nav><!-- top nav -->
		<div class="menu">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="tarif.php">Nos Tarifs</a></li>
				<li><a href="projet.php">Projets</a></li>
				<li><a href="about.html">About</a></li>
			</ul>
		</div>
	</nav><!-- end of top nav -->

	
<fieldset style="margin-top:10px;">	
	<article>
			<p><strong><em style="margin:10px;">Choisir les statistiques de projets<em></strong></p>
			<form>
			<select name="zone" style="margin:10px;">
				<option>Sélectionner</option>
				<option value="lst">Liste des projets</option>
				<option value="stats">Statistiques</option>
				<option value="liste">Liste des libelles</option>
				<option value="mat">Matricule et Nom</option>
			</select>
			<input type="submit" name="button" value="Envoie" />
		</form>
		</article>	
		
<?php	

$bdd = mysql_connect('localhost','root','');
$base = mysql_select_db("thm");
$requette = mysql_query("SELECT * FROM typeprojet")or die('Erreur SQL !'.$req.'<br>'.mysql_error());

if (isset($_REQUEST['zone'] )){
	if ($_REQUEST['zone']== "lst" ){
		$requette = mysql_query("SELECT NumProjet,Designation FROM projettermine WHERE ChargeReelle >= 1.25*ChargeEstimee") or die('Erreur SQL !'.$req.'<br>'.mysql_error());?>
		<p><strong>Liste des projets</strong></p><?php
		$NbColonnes = mysql_num_fields ($requette);
		$NbLignes = mysql_num_rows ($requette);
		$date = date("Y");	
		?>
	
		<center>
			<p><strong>Année <?php echo $date ?> - Admin CL</strong></p>
		</center>

	<table class="table" border="2" style="margin:auto;">
    	<tr>
        	<th width="25%">Numéro de Projet</th>
            <th width="25%">Désignation</th>
		</tr>

        <?php
		while ($valeur = mysql_fetch_row($requette))
		{
		?>
        <tr>
        	<td>
            	<?php echo $valeur[0];?>  
			</td>
			<td>
				<?php echo $valeur[1];?>
			</td>
		</tr>
	<?php
		}

	}elseif ($_REQUEST['zone'] == "stats" ){
	$requette = mysql_query("SELECT typeprojet.Libelle, avg(projettermine.ChargeReelle)FROM projettermine, typeprojet WHERE typeprojet.CodeType = projettermine.CodeType GROUP BY typeprojet.Libelle")or die('Erreur SQL !'.$req.'<br>'.mysql_error());?>
	<p><strong>Statistiques</strong></p><?php
	$NbColonnes = mysql_num_fields ($requette);
	$NbLignes = mysql_num_rows ($requette);
	$date = date("Y");	
	?>

	<center>
	<p><strong>Année <?php echo $date ?> - Admin CL</strong></p>
	</center>

	<table class="table" border="2" style="margin:auto;">
    	<tr>
        	<th width="25%">Libelle</th>
            <th width="25%">Charge Réelle</th>
		</tr>

        <?php
		while ($valeur = mysql_fetch_row($requette))
		{
		?>
        <tr>
        	<td>
            	<?php echo $valeur[0];?>  
			</td>
			<td>
				<?php echo $valeur[1];?>
			</td>
		</tr>
	<?php
		}	
	}elseif  ($_REQUEST['zone'] == "liste" ){
		$requette = mysql_query("SELECT LibServ FROM service, personnel, participeProjet WHERE service.CodeService = personnel.CodeService AND personnel.Matricule = participeprojet.Matricule")or die('Erreur SQL !'.$req.'<br>'.mysql_error());?>
		<p><strong>Liste des libelles</strong></p><?php
		$NbColonnes = mysql_num_fields ($requette);
		$NbLignes = mysql_num_rows ($requette);
		$date = date("Y");	
		?>

		<center>
		<p><strong>Année <?php echo $date ?> - Admin CL</strong></p>
		</center>

	<table class="table" border="2" style="margin:auto;">
    	<tr>
        	<th width="25%">Libelle Service</th>
		</tr>

        <?php
		while ($valeur = mysql_fetch_row($requette))
		{
		?>
        <tr>
        	<td>
            	<?php echo $valeur[0];?>  
			</td>
		</tr>
		
	<?php
		}
	}elseif  ($_REQUEST['zone'] == "mat" ){
	$requette = mysql_query("SELECT personnel.Matricule, NomPers FROM personnel, participeprojet WHERE personnel.Matricule = participeprojet.Matricule AND participeprojet.NbJours IN (SELECT max(NbJours) FROM participeprojet WHERE numprojet = 3)")or die('Erreur SQL !'.$req.'<br>'.mysql_error());?>
	<p><strong>Matricule et Nom</strong></p><?php
	$NbColonnes = mysql_num_fields ($requette);
	$NbLignes = mysql_num_rows ($requette);
	$date = date("Y");	
	?>


	<center>
	<p><strong>Année <?php echo $date ?> - Admin CL</strong></p>
	</center>

	<table class="table" border="2" style="margin:auto;">
    	<tr>
        	<th width="25%">Matricule</th>
            <th width="25%">Nom Personnel</th>
		</tr>

        <?php
		while ($valeur = mysql_fetch_row($requette))
		{
		?>
        <tr>
        	<td>
            	<?php echo $valeur[0];?>  
			</td>
			<td>
				<?php echo $valeur[1];?>
			</td>
		</tr>
		
	<?php
		}
	}
}
mysql_close($bdd);
?>
		</table>
</fieldset>

		<footer>
		<section id="footer-area">

			<section id="footer-outer-block">
					<aside class="footer-segment">
							<h4>Mentions Légal</h4>
								<ul>
									<li><a href="#">Article</a></li>
								</ul>
		
					</aside><!-- end of #first footer segment -->

					<aside class="footer-segment">
							<h4>Contacts</h4>
							<ul>
									<li><a href="#">Numéro</a></li>
							</ul>
					</aside><!-- end of #second footer segment -->

					<div style="float:right;padding-top:90px;padding-right:10px;">
						<p>@Copyright Administration CL 2012</p>
					</div>
					<!--<aside class="footer-segment">
							<h4>Coolness</h4>
								<ul>
									<li><a href="#">one linkylink</a></li>
									<li><a href="#">two linkylinks</a></li>
								</ul>
					</aside>--><!-- end of #third footer segment -->
					
					<!--<aside class="footer-segment">
							<h4>Blahdyblah</h4>
								<p>Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. </p>
					</aside>--><!-- end of #fourth footer segment -->

			</section><!-- end of footer-outer-block -->

		</section><!-- end of footer-area -->
	</footer>
	
</div><!-- #wrapper -->
<!-- Free template created by http://freehtml5templates.com -->
</body>
</div>
</html>
