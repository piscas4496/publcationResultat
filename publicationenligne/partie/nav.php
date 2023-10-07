 <style >
 body{
          /*min-height: 75rem;*/
          /*padding-top: 4.5rem;*/
         }

   </style>

<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gestion vol enligne">
    <meta name="author" content="Piscas maronga">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Fixed top navbar example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">

    

   <!-- Bootstrap core CSS-->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
   
/*style pour fixer lea barre de navigation */

</style>
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>   
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ms-auto mb-2 mb-mg-0">
        <li class="nav-item">

          <?php if(isset($_SESSION)) {

          ?>
           <a class="nav-link " aria-current="page" href="../logout/deconnexion.php">Deconnexion</a>
            </li>
             <li class="nav-item">
          <a class="nav-link" href="index.php">aceuil</a>
          </li>
       
<?php }else{ ?>
  <a class="nav-link " aria-current="page" href="../formulaires/index.php">Aceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login/connexion.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/admin.php">admin</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="../formulaires/inscription.php">inscription</a>
        </li>
        
<?php } ?>

        
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
        <li class="nav-item">
         
      <form class="d-flex">
       
      </form>
    </div>
  </div>
</nav>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/css/bootstrap.min.CSS"></script> 
   <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.CSS">
   
     
 
      
  </body>
</html>


















