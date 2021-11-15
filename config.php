<?php
	try{
		$pdo=new PDO ("mysql:host=localhost;dbname=grendezvous","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>