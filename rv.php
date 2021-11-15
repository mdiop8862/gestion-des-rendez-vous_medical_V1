<?php
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$valider=$_POST["valider"];
	@$age=$_POST['age'];
	@$addresse=$_POST['addresse'];
	@$numero=$_POST['numero'];

	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="<li> date invalide!</li>";
		if(empty($prenom)) $message.="<li>heure invalide!</li>";	
		if(empty($message)){
			include("config.php");
			$req=$pdo->prepare("select id from rv where heurerv=? and daterv=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($nom,$prenom));
			$tab=$req->fetchAll();

			if( count($tab)>0  )
				$message="<li>existe deja un rendez vous a cette date</li>";
			else{
				$ins=$pdo->prepare("INSERT into rv( heurerv,daterv,idpatient,idSecret,idmedecin) values(?,?,?,?,?)");
								$ins->execute(array($prenom,$nom,$age,$addresse,$numero
                                                          ));
								    header("location:succes.php");
				
				
				
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
	 <link rel="stylesheet"  href="rv.css">
	 <link rel="stylesheet"  href="ok.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>rendez vous</title>
</head>
<body class="bg-success">
	<div class="container   ">
	<form action="" method="post" class="formaj offset-md-3  well "  >
		
		<div class="mb-5  nom" >
		<label class="label-form form-group text-light" for="ab">DATE</label>
		 <input type="date" name="nom" required="" id="ab" class=" form-control">
		</div>

       <div class="mb-5 prenom ">
		 <label class="label-form text-light" for="xz"><span class="pr">HEURE</span></label>
		 <input type="time" name="prenom" required="" class="form-control" id="xz">
		</div>
		

         <div class="mb-5 age">
		 <label class="label-form text-light" for="lq">Id patient</label>
		 <input type="number" name="age" required="" class="form-control" id="lq">
		</div>

           <div class="mb-5 add">
		 <label class="label-form text-light" for="ut">Id secretaire</label>
		 <input type="number" name="addresse" required="" class="form-control" id="ut">
		</div>


              
		 <div class="mb-5 tel ">
		 <label class="label-form text-light" for="mn">Id medecin</label>
		 <input type="number" name="numero" id="mn" class="form-control">
           </div>

           
               


     <div class="btn ">

               <button type="submit"  class="btn btn-success" name="valider" >valider</button>

    </div>
          
	</form>
	<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
</div>



</body>
</html>