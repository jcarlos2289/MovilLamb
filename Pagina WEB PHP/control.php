<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/lista.css">
	<title>MOVIL LAMB</title>
	<style type="text/css">
	input,option,label,select,textarea{
		color: rgb(0,0,0);
		width: 30%;
	}

	</style>
	 <style type="text/css">
    h3{
    	color: rgb(0,0,0);
    }
    #lol li{
    	background: #fff;
    	color: rgb(0,0,0); 
    	border-bottom: 2px solid #000; 
    	border-top: 2px solid #000; 
    	border-radius: 0em;
    }
    </style>
</head>
<body>
	<header>
    	<h1>MOVIL LAMB | Control Prenatal </h1> 
    	<nav>
            <ul>
             <li><a href="home.php">Inicio</a></li>
             
            <li><a href="control.php">Control</a></li>
            <li><a href="sms.php">SMS</a></li>
            <li><a href="registro.php">Lista</a></li>
            </ul>
        </nav>
    	
    </header>
    <h2>Formulario De Control Prenatal</h2>
    <article>
		<form method="post">
			<select name='nombre'>
				
				<?php 
						$con=mysqli_connect("localhost","root","","movilamb");
    	
    	
    			$result = mysqli_query($con,"SELECT * FROM  pacientes");

				while($row = mysqli_fetch_array($result) )
  				{
  				echo "<option value=".$row['ID'].">". $row['ID']."-".$row["Nombre"]."</option>" ;
  				
   				 }
				 ?>
			</select>
			<label># De Control</label>
			<input type="text" name='control'/>
			<label>Descripcion</label>
			<textarea name="descripcion">

			</textarea>
			<input type="submit" value="Agregar" />

		</form>
	</article>

		<article>
		<ul id="lol">
			
			<h3>ID | NOMBRE | # Control Prenatal | Descripcion | ID Paciente</h3>
			
                <?php 
                    	$con=mysqli_connect("localhost","root","","movilamb");
    	
    				$result = mysqli_query($con,"SELECT * FROM control");

				while($row = mysqli_fetch_array($result) )
  				{
  					echo "<li class='rojo'>".$row['IDControl'] . " | " . $row['ControlPre']." | ".$row["Descripcion"]." | ".$row["ID"];
  				echo "</li>";
  				
   		 		}

			 ?>
		</ul>
	</article>

</body>
</html>


<?php
$nombre= $_POST['nombre'];
$control= $_POST['control'];
$descripcion= $_POST['descripcion'];

	if (($nombre!="")&&($control!="")&&($descripcion!="")) {
	   	 $con=mysql_connect("localhost","root","");
	    	
	    	mysql_select_db("movilamb",$con);
	    	mysql_query("INSERT INTO control (ControlPre,Descripcion, ID) VALUES ( '".$control."','".$descripcion."','".$nombre."')",$con);
	    	mysql_close($con);
	    	echo "<h2>:)</h2>";
	    
	}
?>