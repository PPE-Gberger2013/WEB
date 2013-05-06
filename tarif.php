<!doctype html>
<html lang="en">
<div style="background-image:url(images/1.png) no-repeat; float-left;">
<head>
	<meta charset="ISO8859-1" />
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

<div style="" >
		<article>
			<p><strong><em style="margin:10px;">Choisir votre zone géographique<em></strong></p>
			<form>
			<select name="zone" style="margin:10px;">
				<option>Sélectionner</option>
				<option value="za">Zone Géographique A</option>
				<option value="zb">Zone Géographique B</option>
				<option value="zc">Zone Géographique C</option>
			</select>
			<input type="submit" name="button" value="Envoie" />
		</form>
		</article>	

</div>
	<?php

//$bdd = new PDO('mysql:host=localhost;dbname=debas_thomas','debas.thomas','5yetwLy'); 
$bdd = mysql_connect('localhost','root','');
$base = mysql_select_db("thm");
$requette = mysql_query("SELECT Type,PrixTerrasse FROM terrasses");

if (isset($_REQUEST['zone'] )){
	if ($_REQUEST['zone']== "za" ){
	$requette = mysql_query("SELECT Type,PrixTerrasse FROM terrasses WHERE Zone='A' ");?>
	<p><strong>Zone Géographique A</strong></p><?php
}elseif ($_REQUEST['zone'] == "zb" ){
	$requette = mysql_query("SELECT Type,PrixTerrasse FROM terrasses WHERE Zone='B' ");?>
	<p><strong>Zone Géographique B</strong></p><?php
}elseif  ($_REQUEST['zone'] == "zc" ){
	$requette = mysql_query("SELECT Type,PrixTerrasse FROM terrasses WHERE Zone='C' ");?>
	<p><strong>Zone Géographique C</strong></p><?php
	}
}

$NbColonnes = mysql_num_fields ($requette);
$NbLignes = mysql_num_rows ($requette);

$date = date("Y");

?>

	<center>
	<p><strong>Tarifs des terrasses Année <?php echo $date ?> - Admin CL</strong></p>
	</center>

	<table class="table" border="2" style="margin:auto;">
    	<tr>
        	<th width="25%">Type de Terrasse</th>
            <th width="25%">Prix au M² (en Euros)</th>
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
mysql_close($bdd);
?>
								
                                </table>
</fieldset>

</div>
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
