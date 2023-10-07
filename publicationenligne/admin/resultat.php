<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>

 <!-- <?php// include("../connexionbd/connexionbd.php");?> -->
<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
<?php include("../partie/header.php"); ?>

<body>
	<form method="POST">
		<div class="row">
			
			<div class=" col-md-5"><br><br><br>
				<h3>codifier le resultat de l'etudiant </h3>
				


				<div class="control-group ">
					<label for="idetudiant">Id etudiant</label>
					<select name="idetudiant" class="form-control" required="required">
							<option value="">
                        <?php
								$req= $bd->prepare("SELECT * FROM etudiant ");
								$execute = $req->execute();
								$liste = $req->fetchAll(PDO::FETCH_ASSOC);
									foreach ($liste as $listes) {
																		
						           echo '<option >'.$listes['idetudiant']."</br>".''; } ?>
						           </option>
						           </select>
						       </div>
			                     
				<div class="control-group ">
					<label for="anneeacad">Annee academique</label>
					<select name="anneeacad" class="form-control">
					<option value="2015">2015</option>
					<option value="2016">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>	
				</select>
				</div>

				<div class="control-group">
					<label for="pourcentage"> Pourcantage</label>
					<input type="number" name="pourcentage" class="form-control">
				</div>

				<div class="control-group ">
					<label for="mention">mention</label>
					<select name="mention" class="form-control">
					<option value="NAF">NAF</option>
					<option value="A">ajourne</option>
					<option value="S">Satifaction</option>
					<option value="D">Dinstinction</option>
					<option value="GD">Grande distinction</option>
					<option value="E">Elite</option>
				</select>
				</div>

				<div class="control-group ">
					<label for="session">Session</label>
					<select name="session" class="form-control">
					<option value="premiere session">premiere session</option>
					<option value="Duexieme session">Duexieme session</option>					
				</select>

				<div class="control-group">
					<label for="coded"> Code</label>
					<input type="text" name="coded" class="form-control">
				</div><br>
				
				
				<input type="submit" name="envoyer" value="S'inscrir" class="btn btn-success"></div>
				<?php
 

//try{
if (isset($_POST['envoyer'])) {
		if (isset($_POST['idetudiant']) 
			AND isset($_POST['anneeacad']) 
			AND isset($_POST['pourcentage'])
			AND isset($_POST['mention'])
			AND isset($_POST['session'])
			AND isset($_POST['coded'])){

		if (!empty($_POST['idetudiant']) 
			AND !empty($_POST['anneeacad'])
		 	AND !empty($_POST['pourcentage'])
	   	    AND !empty($_POST['mention'])
		    AND !empty($_POST['session']) 
		    AND !empty($_POST['coded'])){

			$Idetudiant = htmlspecialchars(trim($_POST['idetudiant']));
			$Anneeacad =htmlspecialchars(trim($_POST['anneeacad']));
			$Pourcentage =htmlspecialchars(trim($_POST['pourcentage']));
			$Mention =htmlspecialchars(trim($_POST['mention']));
			$Session =htmlspecialchars(trim($_POST['session']));
			$Code =htmlspecialchars($_POST['coded']);


			$req = $bd->prepare('SELECT code FROM resultat WHERE code=?');
			$req->execute(array($Code));
			$donnees = $req->fetch();
				if ( $donnees){
             echo "on peux pas publier deux resultat dans une anneé";

				}else{
				
			$req=$bd->prepare("INSERT INTO resultat(idetudian ,anneeacad,pourcentage,mention,sessions,code)VALUES(?,?,?,?,?,?)");

			       $req->execute([$Idetudiant,$Anneeacad,$Pourcentage,$Mention,$Session,$Code]);

					echo "Bravo vous avez codifies un resultat";




								
							}
					} else{
							echo "c'est info existe deja";
						  }
	
			}else{
				echo "certains champs sont encore vides viellez remplir svp";
				}

         }else{
	          echo "tous les champs doivent exister";
             }

    

//}catch(EXCEPTION $e){
			     //echo"echec:".$e->getmessage();
		           //}


?>


				</div>
























				<div class="jumbotron col-md-6">
					<h2>voir les etudiants codifies</h2>
          <?php

           //$req= $bd->prepare("SELECT * FROM etudiant");
							//	$execute = $req->execute();
								//$Etudian = $req->fetchAll(PDO::FETCH_ASSOC);
								
																

          	$req= $bd->prepare("SELECT idresultat,nom,postnom,prenom,anneeacad,pourcentage FROM resultat,etudiant
          		WHERE idetudiant=idetudian");
				$execute = $req->execute();
				$liste= $req->fetch(PDO::FETCH_ASSOC);
				
				echo 'codification numero:'.' '.'<strong>'.$liste['idresultat'].'<br></strong>';
				echo 'Nom etudiant:'.' '.'<strong>'.$liste['nom'].'<br></strong>';
				echo 'Postnom etudiant:'.' '.'<strong>'.$liste['postnom'].'<br></strong>';
				echo ' prenom etudiant:'.' '.'<strong>'.$liste['prenom'].'<br></strong>';
				echo 'Annee academique:'.' '.'<strong>'.$liste['anneeacad'].'<br></strong>';
				echo 'pourcentage  obtenue:'.' '.'<strong>'.$liste['pourcentage'].'%<br></strong><hr>';			
       
          ?> 
				</div>
		</div>
	</form>
</body>
</html>


