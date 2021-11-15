  <?php
	session_start();
	if(@$_SESSION["autoriser"]!="oui"){
		header("location:connexion.php");
		exit();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet"  href="pageSecretaire.css">
	  <link rel="stylesheet"  href="liste.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>Medecin</title>
</head>
<body>
	         
	    
	      <nav class="navbar navbar-expand-lg bg-success "  >
	      	<div class="container-fluid">
	      	<a href="#" class="nav-brand nav-link " ><h1><span class="text-light" >L</span><span class="text-danger" >rd<span class="text-info">v</span></span></h1></a>
	      		
	      	
	      	<ul class="navbar-nav  ">
	      		<li class="nav-item"><a href="listervj.php" class="nav-link text-light text-uppercase px-3 ">Acceuil</a>  </li> 

	      		
	      		 <li class="nav-item text-uppercase px-3"><a href="listepatient.php" class="nav-link text-light">fiche patient</a>

	      		</li>

	      		<li class="nav-item" ><a href="listeRv.php" class="nav-link text-uppercase text-light px-3">rendez vous</a></li>

	      		

	      		<li class="nav-item"><a class="nav-link text-uppercase text-light px-3" href="deconnexion2.php">deconnexion</a></li>


           
	  
	      	
	      	

	      		
	      	</ul>
	      	<div>
	      	
	      		<form action="" method="get">
	      			 
	      			<input type="search" name="search" placeholder="recherche" autocomplete="" class="form-control" >
	      			


	      			
	      		</form>
	      		

	      </nav>
	      



	      

	    	
	    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>