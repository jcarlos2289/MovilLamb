<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/lista.css">
	<title>MOVIL LAMB</title>
	<style type="text/css">
	#lol li{
    	/*background: #fff;*/
    	color: rgb(0,0,0); 
    	border-bottom: 2px solid #000; 
    	border-top: 2px solid #000; 
    	border-radius: 0em;
    }
    </style>
</head>
<body>
	<header>
    	<h1>MOVIL LAMB | SMS </h1> 
    	<nav>
    		<ul>
    			 <li><a href="home.php">Inicio</a></li>
             
            <li><a href="control.php">Control</a></li>
            <li><a href="sms.php">SMS</a></li>
            <li><a href="registro.php">Lista</a></li>
    		</ul>
    	</nav>
    	
    </header>
    <article id="lol">
    	<h2>ID | NOMBRE | LAT | LONG | NUMERO</h2>
		<ul>
			<?php 
                    	$con=mysqli_connect("localhost","root","","movilamb");
    	
    				$result = mysqli_query($con,"SELECT * FROM recibido");

				while($row = mysqli_fetch_array($result) )
  				{

            if($row["codigo"]=3){


  					echo "<li class='rojo'>".$row["codigo"]." |".$row['IDRecibido'] . " | " . $row['Nombre']." | ".$row["Latitud"]." |".$row["Longitud"]." | ".$row["Numero"];
  				echo "</li>";
           }
            if($row["codigo"]=2){


            echo "<li class='amarillo'>".$row["codigo"]." |".$row['IDRecibido'] . " | " . $row['Nombre']." | ".$row["Latitud"]." |".$row["Longitud"]." | ".$row["Numero"];
          echo "</li>";
           }
            if($row["codigo"]=1){


            echo "<li class='verde'>".$row["codigo"]." |".$row['IDRecibido'] . " | " . $row['Nombre']." | ".$row["Latitud"]." |".$row["Longitud"]." | ".$row["Numero"];
          echo "</li>";
           }
  				
   		 		}
   		 		?>
		</ul>
	</article>
</body>
</html>