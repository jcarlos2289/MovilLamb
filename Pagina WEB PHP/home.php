<!DOCTYPE html>
<html>
<head>
    <title>Movil Lamb</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>

    

</head>
<body>
    <header>
    	<h1><a href="/">MOVIL LAMB</a></h1>
    	<nav>
            
            <ul>
            <li><a href="home.php">Inicio</a></li>
             
            <li><a href="control.php">Control</a></li>
            <li><a href="sms.php">SMS</a></li>
            <li><a href="registro.php">Lista</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Ingresar Embarazada</h2>
    	<article id="login">
            <form action="" method="post" name="frm">
    		<input type='text' name="nombre" placeholder='Nombre' />
            <input type='text' name="telefono" placeholder='# Telefono' />
            <select name="comunidad">
                <option>Comunidades</option>
                <?php 
                    $con=mysqli_connect("localhost","root","","movilamb");
        
        
        $result = mysqli_query($con,"SELECT * FROM comunidades  ");

        while($row = mysqli_fetch_array($result) )
        {
                echo "<option value=".$row[0].">". $row[1]."</option>" ;
                
         }
                 ?>
            </select>
            
            <input type='text' name='tg' placeholder='T.G' />
    		<button name='ingresar'>Ingresar</button>
            
            </form>
    	</article>

        <article id="login">
            <form action="" method="post" name="fuu">
            <input type='text' placeholder='ID' name='identidad' />

            <button>Buscar</button>
        </form>
           
        </article>
        <h2>Lista</h2> 
    	 <section  id="mujeres">
            <ul>

                <li>ID | NOMBRE | NUMERO | COMUNIDAD | TIEMPO DE GESTACION</li>
                <?php 
                    $borrar=$_POST["identidad"];
            if($borrar!=""){
                    $con=mysqli_connect("localhost","root","","movilamb");
        
                    $result = mysqli_query($con,"SELECT * FROM pacientes  where ID=".$borrar);

                while($row = mysqli_fetch_array($result) )
                {
                


                echo "<li class='verde'>".$row['ID'] . " | " . $row['Nombre']." | ".$row["Numero"]." | ".$row["IDComunidad"]." | ".$row["TGestacion"];
          echo "</li>";}

                mysql_close($con);
            

                }
                 ?>
                 
            </ul>
        </section>
    </section>
</body>
</html>


<?php





// $ingresar= $_POST['ingresar'];

$nombre= $_POST['nombre'];
$telefono= $_POST['telefono'];
$comunidad= $_POST['comunidad'];
$tg= $_POST['tg'];
if (($nombre!="") &&($telefono !="")&& ($comunidad !="") && ($tg!="")) {
    // do something
    $con=mysql_connect("localhost","root","");
        
        mysql_select_db("movilamb",$con);
        mysql_query("INSERT INTO pacientes (TGestacion, Nombre, Numero, IDComunidad) VALUES ( '".$tg."','".$nombre."','".$telefono."',".$comunidad.")",$con);
        mysql_close($con);
        echo "<h2> :)</h2>";
    
}


?>

