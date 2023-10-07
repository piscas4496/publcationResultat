$req=$bd->query('SELECT resultat.idresultat,resultat.anneeaccad,resultat.idetudian,resultat.pourcentage,resultat.sessions,etudiant.idetudiant,etudiant.nom,etudiant.postnom,etudiant.prenom,etudiant.genre FROM resultat INNER JOIN etudiant ON  idetudian=idetudiant');


//aficage




<?php
if (isset($_GET['idetudiant'])){    
    $req=$bd->prepare(" SELECT idetudian,nom,postnom,prenom,genre,anneeacad ,pourcentage,mention,sessions FROM resultat,etudiant WHERE idetudiant=idetudian");
            $req->execute();
            $total = $req->rowCount();
               if($total>0){                
                    $affichage=$req->fetchAll();
                    
                    switch ($affichage) {
                        case 'value':
                            # code...
                            break;
                        
                        default:
                            # code...
                            break;
                    }

























                        if ($_GET['idetudiant']==$liste['idetudian']) {

                        echo ' Nom est:<strong>'.$liste['nom'].'</strong><br>';
                        echo 'Postnom :<strong>'.$liste['postnom'].'</strong><br>';
                        echo ' Genre:<strong>'.$liste['genre'].'<br></strong>';
                        echo 'Anneé academique:<strong>'.$liste['anneeacad'].'</strong><br>';
                        echo 'pourcentage :<strong>'.$liste['pourcentage'].'</strong><br>';
                       echo 'mention:<strong>'.$liste['mention'].'<strong><br>';
                        echo 'sessions:<strong>'.$liste['sessions'].'</strong><br><br><hr>';
                         
                                    }else{ 
                                        
                                     echo "resultat non diponible";echo 'Anneé academique:<strong>'.$liste['anneeacad'].'</strong><br>';
                                        
                                 }
                     
                                  



                     }
                }
            
           }