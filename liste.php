


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 
	 <link rel="stylesheet"  href="liste.css">
	 <link rel="stylesheet"  href="pageSecretaire.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>patient</title>
</head>
<body >
	  <?php
	       include("pageSecretaire.php");
	       ?>
	<div class="containe col-md-6 offset-4 spacer">
		
			
			      <div class="panel">
			      	<div class="panel-heading text-light bg-success naruto">
			                Liste des patients	
			</div>
			     <table class="table table-Light table-striped table-hover table-bordered">
			     <thead>
			     	     <tr class="bg-success p-2 bg-opacity-75">
                        <th class="text-light px-3" scope="col">Id</th>
                        <th class="text-light px-3" scope="col">Nom</th>
                        <th class="text-light px-3" scope="col">Prenom</th>
                         <th class="text-light px-3" scope="col">Age</th>
                         <th class="text-light px-3" scope="col">addresse</th>
                         <th class="text-light px-3" scope="col">Telephone</th>
                         <th class="text-light px-3" scope="col">Sexe</th>
                       


					</tr>
			     </thead>
			        <tbody>
			     	    <?php

                           include("config.php");
                           $query="SELECT * from patient";
                           $result=$pdo->query($query);
                           $data= $result->fetchAll();
                            for($i=0; $i<count($data) ;$i++){
                            	$id=$data[$i]["idpatient"];
                            	$nom=$data[$i]["Nom"];
                            	$prenom=$data[$i]["Prenom"];
                            	$age=$data[$i]["age"];
                            	$addresse=$data[$i]["addresse"];
                            	$tel=$data[$i]["telPatient"];
                            	$sexe=$data[$i]["SEXE"];

                          

                            
                            	      
                            	     
                            
                            ?>
                                <tr>
                                     <td><?php echo $id; ?> </td>
                                     <td><?php echo $nom; ?> </td>
                                     <td><?php echo $prenom; ?> </td>
                                     <td><?php echo $age; ?> </td>
                                     <td><?php echo $addresse; ?> </td>
                                     <td><?php echo $tel; ?> </td>
                                     <td><?php echo $sexe; ?> </td>
                                   







                                </tr>
                                <?php
                           	      }
                           
			     	              ?>
			     	   






    </tbody>


			     
			 </table>
			</div>

	
				
			</div>
			

	

</



	  
	
  



        
</body>
</html>