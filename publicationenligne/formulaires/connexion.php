
<?php
 include("../partie/header.php"); 
  if (isset($_POST['connexion'])) { 
  	echo $error="";

  		   $Email= htmlspecialchars(trim($_POST['email']));
           $Password =sha1($_POST['password']);               
 	  		if (isset($Email) AND isset($Password)) {
 	 	 		if(!empty($Email) AND !empty($Password)) {
  		     
                  $req=$bd->prepare("SELECT * FROM etudiant WHERE  email=? AND password=?");	
 	 	  		   $req->execute(array($Email,$Password));
 	 	  		   $etudexist=$req->rowCount();
           					if ($etudexist ==1) {
           				$affichage = $req->fetch();


           				   $_SESSION['idetudiant'] = $affichage['idetudiant'];
           					$_SESSION["nom"]=$affichage['nom'];
           					$_SESSION["postnom"]=$affichage['postnom'];
           			 		$_SESSION["prenom"]=$affichage['prenom'];
           					$_SESSION["email"]=$affichage['email'];

                             
		header("Location:profil.php?idetudiant=".$_SESSION['idetudiant']);
					 		
					 				 
						
 	 	                 }else{
 	 						$error = "mauvais email ou mot de passe";
 	 					     }
 
																	
				}else{
					 $error='vous devez remplir tous les champs svp!';
				     }	
      		
      	}else{
      		$error="certains champs n'existent pas ";
      		}
	}
	
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	 
</head>
  
    	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
       
<body >
	<div class="container"  align="center">
		<form id="formul" method="POST" align="center">
			<div class="">
		   <img id="images" src="../images/2044908.jpg">

				<div class="conntrol-group">
				<label>email</label><br>
		        <input type="text" name="email" class="for-control"><br>
				</div>
				<div class="control-group" >
				<label>mot de passe</label><br>
		        <input type="password" name="password" class="forcontrol">
			</div><br>
			<input type="submit" name="connexion" value="Se connecter" class="btn btn-primary"><br>
			</div>
			<?php if (isset($error)) {
				echo $error;
			} ?>		
    </div>

	
	</form>
	</div>
</body>
</html>
<style >
	#formul{
		border: 2px solid blue;
		border-radius: 10px;
		width: 300px; 
		height: 350px; 
	   position:center;
	   margin-top: 100px;
	}
	
#images{
 	 width:150px;
	 height: 150px; 
	 border-radius:50%;
    }

</style>
