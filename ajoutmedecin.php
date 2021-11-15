<?php
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$mail=$_POST["mail"];
	@$mdp=$_POST["mdp"];
	@$confirmepass=$_POST["confirmepass"];
	@$valider=$_POST["valider"];
	@$age=$_POST['age'];
	@$addresse=$_POST['addresse'];
	@$numero=$_POST['numero'];
	@$numero1=$_POST['numero1'];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="<li>Non invalide!</li>";
		if(empty($prenom)) $message.="<li>Prénom invalide!</li>";
		if(empty($mail)) $message.="<li>Login invalide!</li>";
		if(empty($mdp)) $message.="<li>Mot de passe invalide! </li>";
		if($mdp!=$confirmepass) $message.="<li>Mots de passe non identiques!</li>";	
		if(empty($message)){
			include("config.php");
			$req=$pdo->prepare("select idmedecin from medecin where emailMedecin=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail));
			$tab=$req->fetchAll();

            $req=$pdo->prepare("select idSecret from secretaire where emailSecret=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($mail));
			$taba=$req->fetchAll();



			if(count($tab)>0 or count($taba)>0)
				$message="<li> Login existe déjà! </li>";
			else{
				$ins=$pdo->prepare("insert into medecin(NomMedecin,PrenomMedecin,ageMedecin,addresseMedecin,telMedecin,fixeMedecin,passwordMedecin,emailMedecin) values(?,?,?,?,?,?,?,?)");
								$ins->execute(array($nom,$prenom,$age,$addresse,$numero,$numero1,md5($mdp),$mail
                                                          ));
				header("location:sucess1.php");
				
				
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 
	 <link rel="stylesheet"  href="suite.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>formMedecin</title>
</head>
<body class="bg-success">
	<div class="container   ">
	<form action="" method="post" class="formaj offset-md-3  well enctype=multipart/form-data "  >
		<div class="row">
		<div class="mb-4  col nom" >
		<label class="label-form form-group text-light" for="ab">Nom</label>
		 <input type="text" name="nom" required="" id="ab" class=" form-control">
		</div>

       <div class="mb-4 prenom col">
		 <label class="label-form text-light" for="xz"><span class="pr">Prenom</span></label>
		 <input type="text" name="prenom" required="" class="form-control" id="xz">
		</div>
		</div>

         <div class="mb-4  age">
		 <label class="label-form text-light" for="lq">age</label>
		 <input type="number" name="age" required="" class="form-control" id="lq">
		</div>

           <div class="mb-4 add">
		 <label class="label-form text-light" for="ut">addresse</label>
		 <input type="text" name="addresse" required="" class="form-control" id="ut">
		</div>


              <div class="row">
		 <div class="mb-4 col tel ">
		 <label class="label-form text-light" for="mn">Numero telephone</label>
		 <input type="tel" name="numero" id="mn" class="form-control">
           </div>

           <div class="mb-4 col proche">
		 <label class="label-form text-light" for="bn">Numero fixe</label>
		 <input type="tel" name="numero1" class="form-control" id="bn">
		</div> 
		</div>
		  <div class="mb-4 med">
		       <label for="med" class="label-form text-light" >email</label>
		       <input type="email" name="mail" required="" class="form-control" id="med" >
		       </div>
		       <div class="row">  
		         <div class="mb-4 mou col pass">
             	<label for="mou" class="label-form text-light">password</label>
             	<input type="password" name="mdp" class="form-control" required="" autocomplete="" id="mou">
             </div>
             <div class="col so">
             	<label for="mou" class="label-form text-light " >confirme password</label>
             	<input type="password" name="confirmepass" class="form-control " required="" id="mou">

              </div>

                



      <div class="btn ">
		  <button class="btn btn-success" type="submit" name="valider">valider</button>
		  </div>
          
	</form>
	<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>

</div>



</body>
</html>