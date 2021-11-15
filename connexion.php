
<?php
	session_start();
	@$mail=$_POST["mail"];
	@$mdp=$_POST["mdp"];
	@$connecter=$_POST["connecter"];
	@$connect=$_POST['connect'];
	$message="";
		
	if(isset($connecter)){
		include("config.php");
		$res=$pdo->prepare("select * from medecin where emailMedecin=? and passwordMedecin=?  limit 1");
                          
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($mail,md5($mdp)));
		$tab=$res->fetchAll();


		
		if(count($tab)==0 )
			$message="<li>Mauvais login ou mot de passe!</li>";
		else{
                  

            


			$_SESSION["autoriser"]="oui";

			$req=$pdo->prepare(' SELECT idmedecin FROM medecin where emailMedecin=? ');
			$req->execute(array($mail));
			while($donnees=$req->fetch());
			{
				$idMedecin=$donnees['idmedecin'];
			}
			$req->closeCursor();
			$_SESSION['idmedecin']=$idMedecin;

			

			
			header("location:pageMedecin.php");

		}


		
	





	}
	elseif (isset($connect)) {

		include("config.php");
		$res=$pdo->prepare("SELECT * from secretaire where emailSecret=? and passwordSecret=?  limit 1");

		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($mail,md5($mdp)));
		$tab=$res->fetchAll();
		if(count($tab)==0)
			$message="<li>Mauvais login ou mot de passe!</li>";
		else{
			$_SESSION["autoriser"]="oui";
		
			header("location:pageSecretaire.php");
		}

		
	}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet"  href="style.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>connexion</title>
</head>
<body class="bg-success bg-opacity-75">

    <nav navbar>
    	<a href="#" class="nav-brand nav-link " ><h1><span class="text-light" >L</span><span class="text-danger" >rd<span class="text-info">v</span></span></h1></a>
    </nav>

	  <div class="container offset-md-3 col-md-7" >
	  	<h2>connexion</h2>
	  	
	  	<form action="" method="post" class="well" >
	  		<div class="email" >
	  			<label for="email" class="form-label">email</label>
	  			<input class="form-control" type="email" name="mail" id="mail" required="" autocomplete="">
	  			
	  		</div>
	  		<div class="mdp">
	  			<label  for="mdp" class="form-label btn-group">mot de passe</label>
	  			<input class="form-control" type="password" name="mdp" id="mdp" required="">
	  			
	  		</div>
	  		<div class="btn px-3">
	  			<button type="submit"  class="btn btn-success " name="connecter">login doctor</button>
	  			<button type="submit" class="btn btn-success " name="connect">login secretary</button>
	  			<button type="reset" class=" btn btn-light">Annuler</button>
	  			
	  		</div>
	  		
	  	</form>
	  	<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>


	  		
	  	</div>
	  	
	  </div>
      

</body>
</html>