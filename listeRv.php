


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 
	 <link rel="stylesheet"  href="liste.css">
	 <link rel="stylesheet"  href="pageSecretaire.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>rendez vous</title>
</head>
<body >
	  <?php
	       include("pageMedecin.php");
	       ?>
	<div class="containe col-md-6 offset-4 spacer">
		
			
			      <div class="panel">
			      	<div class="panel-heading text-light bg-success naruto">
			                Liste des rendez-vous	
			</div>
			     <table class="table table-Light table-striped table-hover table-bordered">
			     <thead>
			     	     <tr class="bg-success p-2 bg-opacity-75">
                        <th class="text-light px-3" scope="col">Date</th>
                        <th class="text-light px-3" scope="col">Heure</th>
                        
                         <th class="text-light px-3" scope="col">Id patient</th>
                       


					</tr>
			     </thead>
			        <tbody>
			     	    <?php

                           include("config.php");
                           $today='08-11-2021';
                           $query="SELECT daterv,heurerv, idpatient from rv ";
                           $result=$pdo->query($query);
                           $data= $result->fetchAll();
                            for($i=0; $i<count($data) ;$i++){
                            	$date=$data[$i]["daterv"];
                            	$heure=$data[$i]["heurerv"];
                            	$id=$data[$i]["idpatient"];
                          

                

                            	      
                            	     
                            
                            ?>
                                <tr>
                                     <td><?php echo $date; ?> </td>
                                     <td><?php echo $heure; ?> </td>
                                     <td><?php echo $id; ?> </td>
                                   







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