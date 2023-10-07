<?php

try{
$bd= new PDO("mysql:host=localhost;dbname=publicationenligne","root","");
}catch(PDOEXCEPTION $e){ 
echo "echec:".$e->getmessage();
}

?>