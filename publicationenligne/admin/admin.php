<br>
<br>
<br>
<?php
 include("../partie/header.php"); 
  if (isset($_POST['connexion'])) { 
  	echo $error="";
  		   $Login= htmlspecialchars(trim($_POST['login']));
           $Password =htmlspecialchars($_POST['password']);               
 	  		if (isset( $Login) AND isset($Password)) {
 	 	 		if(!empty( $Login) AND !empty($Password)) {
              $req=$bd->prepare("SELECT * FROM admin WHERE login=? AND passwordadmin=?");	
 	 	  		   $req->execute(array( $Login,$Password));
 	 	  		   $etudexist=$req->rowCount();
           					if ($etudexist ==1) {
           				$affichage = $req->fetch();
           				   $_SESSION['codeadmin'] = $affichage['codeadmin'];
           					$_SESSION["login"]=$affichage['login'];
           					
		header("Location:../admin/resultat.php?codeadmin=".$_SESSION['codeadmin']);				 				 
						
 	 	                 }else{
 	 						$error = "mauvais login ou mot de passe";
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
			<h6>connectez vous en tant qu'admin</h6>
			<div class="">
		   <img id="images" src="../images/Collaborator Male_96px.PNG">

				<div class="conntrol-group">
				<label>email</label><br>
		        <input type="text" name="login" class="for-control"><br>
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
		height: 400px; 
	   position:center;
	   
	}
	
#images{
 	 width:150px;
	 height: 150px; 
	 border-radius:50%;
    }

</style>
