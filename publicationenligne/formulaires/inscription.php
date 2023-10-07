<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
?>
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
<?php include("../partie/header.php"); ?>

<body>
	<form method="POST">
		<div class="row">
			<div class="col-md-4">
				
<p>Nous vous invitons a prendre incription pour voir vos resultat dans une fiabilite et clarte</p>
	<img src="../images/wp4019946.JPG" class="logos"> 
			</div>
			<div class="jumbotron col-md-4">
				
				<div class="control-group">
					<label for="nom">Nom</label>
					<input type="text" name="nom" class="form-control">
				</div>

				<div class="control-group">
					<label for="postnom">Postnom</label>
					<input type="text" name="postnom" class="form-control">
				</div> 

				<div class="control-group">
					<label for="prenom">Prenom</label>
					<input type="text" name="prenom" class="form-control">
				</div>

				<div class="control-group ">
					<label for="genre">Genre</label>
					<select name="genre" class="form-control">
					<option value="femme">Feminin</option>
					<option value="homme">Masculin</option>
				</select>
				</div>

				<div class="control-group ">
					<label for="departement">departement</label>
					<select name="departement" class="form-control">
					<option value=" sciences Informatiques ">sciences Informatiques</option>
					<option value="sciences commeriales">sciences commeriales</option>
					<option value="sante public">sante public</option>
				</select>
				</div>
			</div>
				<div class="jumbotron col-md-4">
				<div class="control-group ">
					<label for="option">Genre</label>
					<select name="option" class="form-control">
					<option value="IG">Informatique de gestion</option>
					<option value="RTL">reseau et telecom</option>
					<option value="Micro-finances">Micro-finances</option>
					<option value="sante public">sante public</option>
				</select>
				</div>

				<div class="control-group ">
					<label for="auditoire">Genre</label>
					<select name="auditoire" class="form-control">
					<option value="G1">G1</option>
					<option value="G2">G2</option>
					<option value="G3">G3</option>
					<option value="L1">L1</option>
					<option value="L2">L2</option>
				</select>
				</div>

				<div class="control-group">
					<label for="telephone">Numero telephone</label>
				    <input type="text" name="telephone" class="form-control">
				</div>

				<div class="control-group">
					<label for="email">Adresse Email</label>
				    <input type="text" name="email" class="form-control">
				
				</div>

				<div class="control-group">
					<label for="password">mot de passe</label>
					<input type="password" name="password" class="form-control">
				</div class="control-group"><br>

				
				<input type="submit" name="envoyer" value="S'inscrir" class="btn btn-success">
			</div>
			</div>
		
	</form>

	<!--traiment de formulaire en php -->

</body>
</html>


<?php

try{
if (isset($_POST['envoyer'])) {
	if (isset($_POST['nom']) AND isset($_POST['postnom']) AND isset($_POST['prenom']) AND isset($_POST['genre']) AND isset($_POST['departement']) AND isset($_POST['option']) AND isset($_POST['auditoire']) AND isset($_POST['telephone']) AND isset($_POST['email']) AND  isset($_POST['password'])) {

		if (!empty($_POST['nom']) 
			AND !empty($_POST['postnom'])
		 	AND !empty($_POST['prenom'])
	   	    AND !empty($_POST['genre'])
		    AND !empty($_POST['departement'])
		    AND !empty($_POST['option']) 
		    AND !empty($_POST['auditoire']) 
		    AND!empty($_POST['telephone'])
		    AND !empty($_POST['email'])
		    AND !empty($_POST['password'])) {

			$Nom = htmlspecialchars(strtoupper($_POST['nom']));
			$Postnom =htmlspecialchars(strtoupper($_POST['postnom']));
			$Prenom =htmlspecialchars(trim($_POST['prenom']));
			$Genre =htmlspecialchars(trim($_POST['genre']));
			$Departement =htmlspecialchars(trim($_POST['departement']));
			$Option =htmlspecialchars(trim($_POST['option']));
			$Auditoire = htmlspecialchars(trim($_POST['auditoire']));
			$Telephone =htmlspecialchars(trim($_POST['telephone']));
			$Email= htmlspecialchars(strtolower($_POST['email']));			
			$Password =sha1($_POST['password']);
			


$req = $bd->prepare('SELECT email FROM etudiant WHERE email =?');
$req->execute(array($Email));
$donnees = $req->fetch();

	$req = $bd->prepare('SELECT telephone FROM etudiant WHERE telephone =?');
$req->execute(array($Telephone));
$donnet = $req->fetch();




if ($donnet OR $donnees  )
 // Si une valeur est retournée c'est qu'un membre possède déjà le pseudo.
{
	echo " ces informations existent deja! Vous ne pouvez pas inserez une meme adresse electronique  ou un  numero de telphone deux fois";

}else{
	$req=$bd->prepare("INSERT INTO etudiant(nom,postnom,prenom,genre,departement,option,auditoire,telephone,email,password)VALUES(?,?,?,?,?,?,?,?,?,?)");
		$req->execute([$Nom,$Postnom,$Prenom,$Genre,$Departement,$Option,$Auditoire,$Telephone,$Email,$Password]);

			echo "Bravo vous etes inscrit dans le systesme";
	
	

}
		
		
		
		
		
	}else{
		echo "certains champs sont encore vides viellez remplir svp";
	}

}else{
	echo "tous les champs doivent exister";
}

}


}catch(EXCEPTION $e){
			echo"echec:".$e->getmessage();
		}


?>
<style >
	.logos{
    width: 500px;
    height: 475px;

	}



</style>
