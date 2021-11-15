
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
				header("location:success5.php");
				
				
			}
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet"  href="fatigue.css">
	 <link rel="stylesheet"  href="math.css">
	 	 <link rel="stylesheet"  href="liste.css">


	 

	 
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>administrateur</title>
</head>
<body >
	
	  
	<div class="container-fluid">
                       
                   
                       <div class="row sorry">
                        <div class="col-md-6 ">
                        	<div class="tab">
                            <div class="panel-heading text-light bg-success texte ">
                            Liste des medecin  
                                     			     <table class="table table-Light table-striped table-hover table-bordered">
			     <thead>
			     	     <tr class="bg-success p-2 bg-opacity-75">
                        <th class="text-light px-3" scope="col">Id</th>
                        <th class="text-light px-3" scope="col">Nom</th>
                        <th class="text-light px-3" scope="col">Prenom</th>
                         <th class="text-light px-3" scope="col">Age</th>
                         <th class="text-light px-3" scope="col">addresse</th>
                         
                         
                                                  <th class="text-light px-3" scope="col">Email</th>

                       


					</tr>
			     </thead>
			        <tbody>
			     	    <?php

                           include("config.php");
                           $query="SELECT * from medecin";
                           $result=$pdo->query($query);
                           $data= $result->fetchAll();
                            for($i=0; $i<count($data) ;$i++){
                            	$id=$data[$i]["idmedecin"];
                            	$nom=$data[$i]["NomMedecin"];
                            	$prenom=$data[$i]["PrenomMedecin"];
                            	$age=$data[$i]["ageMedecin"];
                            	$addresse=$data[$i]["addresseMedecin"];
                            	
                            

                            	$email=$data[$i]["emailMedecin"];

                          

                            
                            	      
                            	     
                            
                            ?>
                                <tr>
                                     <td><?php echo $id; ?> </td>
                                     <td><?php echo $nom; ?> </td>
                                     <td><?php echo $prenom; ?> </td>
                                     <td><?php echo $age; ?> </td>
                                     <td><?php echo $addresse; ?> </td>
                                     
                                     <td><?php echo $email; ?> </td>
                                   







                                </tr>
                                <?php
                           	      }
                           
			     	              ?>
			     	   






    </tbody>


			     
			 </table>

                            </div>

                            </div>
                            
                        </div>

                        <div class="col-md-5">
                        	<div class="tab2">
                        	<div class="panel-heading text-light bg-success texte ">
                            ajout medecin
                            </div>
                            <form action="" method="post" class="formaj offset-md-3  well  enctype=multipart/form-data "  >
		<div class="row">
		<div class="mb-4  col nom" >
		<label class="label-form form-group text-success" for="ab">Nom</label>
		 <input type="text" name="nom" required="" id="ab" class=" form-control">
		</div>

       <div class="mb-4 prenom col">
		 <label class="label-form text-success" for="xz"><span class="pr">Prenom</span></label>
		 <input type="text" name="prenom" required="" class="form-control" id="xz">
		</div>
		</div>

         <div class="mb-4  age">
		 <label class="label-form text-success" for="lq">age</label>
		 <input type="number" name="age" required="" class="form-control" id="lq">
		</div>

           <div class="mb-4 add">
		 <label class="label-form text-success" for="ut">addresse</label>
		 <input type="text" name="addresse" required="" class="form-control" id="ut">
		</div>


              <div class="row">
		 <div class="mb-4 col tel ">
		 <label class="label-form text-success" for="mn">Numero telephone</label>
		 <input type="tel" name="numero" id="mn" class="form-control">
           </div>

           <div class="mb-4 col proche">
		 <label class="label-form text-success" for="bn">Numero fixe</label>
		 <input type="tel" name="numero1" class="form-control" id="bn">
		</div> 
		</div>
		  <div class="mb-4 med">
		       <label for="med" class="label-form text-success" >email</label>
		       <input type="email" name="mail" required="" class="form-control" id="med" >
		       </div>
		       <div class="row">  
		         <div class="mb-4 mou col pass">
             	<label for="mou" class="label-form text-success">password</label>
             	<input type="password" name="mdp" class="form-control" required="" autocomplete="" id="mou">
             </div>
             <div class="col so">
             	<label for="mou" class="label-form text-success " >confirme password</label>
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
                            
                        </div>
                           
                       </div>








		
			    </div>



	  
	
  



        
</body>
</html>