<?php 
	$id=$_GET["id"];
	$clave=$_GET["clave"];
	
	if($id!=""){
		if($clave!=""){
			$con=mysqli_connect("localhost","root","","movilamb");
    	
    	
    	$result = mysqli_query($con,"SELECT * FROM login WHERE  Usuario='".$id."' AND Contrasena = '".$clave."'");

		while($row = mysqli_fetch_array($result) )
  		{
  				
  				header('Location: home.php');
   		 }
   		 

	}
	else{
		header('Location: index.html');
		
	}
	
	}
 ?>