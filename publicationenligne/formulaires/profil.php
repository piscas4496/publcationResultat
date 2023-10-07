
<?php 
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/font-awosome.min.css">
<?php include("../partie/header.php"); ?>
<body>
   <div class="row">
    
     <div id="res" class="col-md-4 jumbotron">
  <?php
      if (isset($_GET['idetudiant']) AND $_GET['idetudiant']==1) {    
            $IdEtud=intval($_GET['idetudiant']);
            $req=$bd->prepare("SELECT * FROM etudiant WHERE idetudiant=?");
            $req->execute(array($IdEtud));
            $affichage=$req->fetch();
            echo "Bienvenue".' '.$affichage["nom"].' '.$affichage["postnom"]."<br>"; 
         }  
     ?>   
               <form method="GET" align="center"><br>
               <h3>Bienvenue dans ton profil</h3><hr> 
               <p>Si vous ne voiyer pas votre resultat ne panique pas. il serat la dans peux de tems merci!</p>      
  <?php
        if (isset($_GET['idetudiant'])){  
            $req=$bd->prepare(" SELECT DISTINCT idetudian,nom,postnom,prenom,genre,anneeacad ,pourcentage,mention,sessions FROM resultat,etudiant WHERE idetudiant=idetudian");
               $req->execute();
               $total = $req->rowCount();
                   if($total>0){            
                          $affichage=$req->fetchAll();          
                         foreach ($affichage as $liste) {
                             if($_GET["idetudiant"]==$liste["idetudian"]){
                                echo '<div id="decor" align="center" >';   
                                echo ' Nom :<strong>'.$liste['nom'].'</strong><br>';
                                echo 'Postnom :<strong>'.$liste['postnom'].'</strong><br>';
                                echo ' Genre:<strong>'.$liste['genre'].'<br></strong>';
                                echo 'Anneé academique:<strong>'.$liste['anneeacad'].'</strong><br>';
                                echo 'pourcentage :<strong>'.$liste['pourcentage'].'%</strong><br>';
                                echo 'mention:<strong>'.$liste['mention'].'</strong><br>';
                                echo 'sessions:<strong>'.$liste['sessions'].'</strong><br><br><hr>';
                                echo  "</div>";
                          } 
                     }
                
                                     
             }else{ echo "resultat non disponible veillez ptientez"; }
        
           }
              
  ?>
     </div>
              <div class="col-md-8">
               <img class="bille" src="../images/4521307.JPG" class="logos">
          </div >
      </div>
    </form>
  </body>
</html>
>

<style >
  #decor{
border:1px solid black;
height: 300px;
width: 300px;
position: center;
margin-left: 100px;

  }
  .bille{
width: 900px;
height: 600px;
margin-left: -20px;
  }
  #res{
height: 600px;

  }


</style>

 
    
