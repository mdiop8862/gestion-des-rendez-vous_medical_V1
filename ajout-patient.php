<?php

		include("config.php");

	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$valider=$_POST["valider"];
	@$age=$_POST['age'];
	@$addresse=$_POST['addresse'];
	@$numero=$_POST['numero'];
	@$numero1=$_POST['numero1'];
	@$SEXE=$_POST['SEXE'];

	


	               if(   isset($nom) & isset($prenom) & isset($age) & isset($addresse) & isset($numero) & isset($numero1) & isset($SEXE) ){

                                $insertion=$pdo->prepare('INSERT INTO patient VALUES(NULL,:Nom,:Prenom,:age,:addresse,:telPatient,:fixePatient,:SEXE)');
                                	$insertion->bindvalue(':Nom',$nom );
                                	$insertion->bindvalue(':Prenom',$prenom );
                                	$insertion->bindvalue(':age',$age );
                                    $insertion->bindvalue(':addresse',$addresse );
                                   $insertion->bindvalue(':telPatient',$numero );
                                   $insertion->bindvalue(':fixePatient',$numero1 );
                                   $insertion->bindvalue(':SEXE',$SEXE);
                                    $verification=$insertion->execute();

                                    if($verification)

                                 
                                       header("location:success4.php");
                                   else{
                                   	     echo "echec d'insertion";
                                   }
                                	
                                	







	               }

	
    
	
 
?>







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet"  href="ajout.css">
	 <link rel="stylesheet"  href="patient.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>formPatient</title>
</head>
<body class="bg-success">
	<div class="container   ">
	<form  method="post" class="formaj offset-md-3  well "  >
		
		<div class="mb-3  nom" >
		<label class="label-form form-group text-light" for="ab">Nom</label>
		 <input type="text" name="nom" required="" id="ab" class=" form-control">
		</div>
		

       <div class="mb-3 prenom ">
		 <label class="label-form text-light" for="xz"><span class="pr">Prenom</span></label>
		 <input type="text" name="prenom"  class="form-control" id="xz">
		</div>
		       

         <div class="mb-3  age">
		 <label class="label-form text-light" for="lq">age</label>
		 <input type="number" name="age" required="" class="form-control" id="lq">
		</div>

           <div class="mb-3 add">
		 <label class="label-form text-light" for="ut">addresse</label>
		 <input type="text" name="addresse" required="" class="form-control" id="ut">
		</div>


              
		 <div class="mb-3  tel ">
		 <label class="label-form text-light" for="mn">Numero telephone</label>
		 <input type="number" name="numero" id="mn" class="form-control">
           </div>

           <div class="mb-3  proche">
		 <label class="label-form text-light" for="bn">Numero d'un proche</label>
		 <input type="number" name="numero1" class="form-control" id="bn">
		</div> 
		
		    <div class="mb-4">

                <fieldset class="text-alight:center;">
                	<legend class="text-light">SEXE</legend>
                	      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
  <input type="radio" class="btn-check" id="btncheck1" autocomplete="off" name="SEXE" value="M">
  <label class="btn btn-outline-light px-5" for="btncheck1" >Masculin</label>

  <input type="radio" class="btn-check" id="btncheck2" autocomplete="off" name="SEXE" value="F">
  <label class="btn btn-outline-light px-5" for="btncheck2" >Feminin</label>
</div>
            </div>
                	   



             
                	   
  



  
                </fieldset>


    <div class="mb-3">
    			  <button class="btn btn-success " type="submit">valider</button>
    </div>


          
	</form>
	<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
</div>



</body>
</html>