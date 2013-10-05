<!DOCTYPE html>
<html>
<head>
	<title>MOVIL LAMB</title>
	<style type="text/css">
	
	</style>
<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/lista.css">

    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <style type="text/css">
    h3{
    	color: rgb(0,0,0);
    }
    /*#lol li{
    	background: #fff;
    	color: rgb(0,0,0); 
    	border-bottom: 2px solid #000; 
    	border-top: 2px solid #000; 
    	border-radius: 0em;
    }*/
    #un{
      float: left;
    }
    </style>
</head>
<body>
	<header>
    	<h1>MOVIL LAMB | Lista </h1> 
    	<nav>
    	<ul>
            <li><a href="home.php">Inicio</a></li>
             
            <li><a href="control.php">Control</a></li>
            <li><a href="sms.php">SMS</a></li>
            <li><a href="registro.php">Lista</a></li>
            </ul>
           </nav>
    	
    </header>
    <h2>Actualizar Embarazada</h2>
      <article id="login">
            <form action="" method="post" name="frm">
              <input type='text' name="id" placeholder='Id' />
        <input type='text' name="nombre" placeholder='Nombre' />
            <input type='text' name="telefono" placeholder='# Telefono' />
            <input type='text' name="comunidad"  placeholder='Comunidad'/>
            <input type='text' name='tg' placeholder='T.G' />
            <button name="actualizar">Actualizar</button>
            </form>
      </article>

        <article id="login">
           <form action="" method="post" name="fuu">
            <input type='text' placeholder='ID' name='identidad' />
            <button>Eliminar</button>
          </form>
        </article>



    
	<article id="un">
		<ul id="lol">
			
			<h3>ID | NOMBRE | NUMERO | COMUNIDAD | TIEMPO DE GESTACION</h3>
			
                <?php 
                    	$con=mysqli_connect("localhost","root","","movilamb");
    	
    				$result = mysqli_query($con,"SELECT * FROM pacientes");

				while($row = mysqli_fetch_array($result) )
  				{
            if($row["TGestacion"]<3){
              echo "<li class='verde'>".$row['ID'] . " | " . $row['Nombre']." | ".$row["Numero"]." | ".$row["IDComunidad"]." | ".$row["TGestacion"];
          echo "</li>";
            }
  					 if(($row["TGestacion"]<6)&&($row["TGestacion"]>3)){
              echo "<li class='amarillo'>".$row['ID'] . " | " . $row['Nombre']." | ".$row["Numero"]." | ".$row["IDComunidad"]." | ".$row["TGestacion"];
          echo "</li>";
            }
             if($row["TGestacion"]>6){
              echo "<li class='rojo'>".$row['ID'] . " | " . $row['Nombre']." | ".$row["Numero"]." | ".$row["IDComunidad"]." | ".$row["TGestacion"];
          echo "</li>";
            }
  				
   		 		}

			 ?>
		</ul>
	</article>

</body>
</html>


<?php





 $ingresar= $_POST['id'];
$nombre= $_POST['nombre'];
$telefono= $_POST['telefono'];
$comunidad= $_POST['comunidad'];
$tg= $_POST['tg'];
$borrar=$_POST["identidad"];
if (($nombre!="") &&($telefono !="")&& ($comunidad !="") && ($tg!="") &&($ingresar!="")) {
    // do something
    $con=mysql_connect("localhost","root","");
        mysql_select_db("movilamb",$con);
        mysql_query("UPDATE pacientes SET  TGestacion='".$tg."', Nombre='".$nombre."', Numero='".$telefono."', IDComunidad='".$comunidad."' where ID=".$ingresar,$con);
        mysql_close($con);
        echo "<h2> :)</h2>";
    
}
if($borrar!=""){
      $con=mysql_connect("localhost","root","");
        mysql_select_db("movilamb",$con);
        mysql_query("DELETE FROM  pacientes where ID=".$borrar,$con);
        mysql_close($con);
        echo "<h2> :) Borrado</h2>";

}


?>