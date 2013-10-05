<?php
class BaseDeDatos {
   

    function conecion() {
       	// Check connection
		if (!($con=mysql_connect("localhost","root",""))) 
		{ 
		 
		exit(); 
		} 
		if (!mysql_select_db("movilamb",$con)) 
		{ 
	
		exit(); 
		} 
		return $con; 
		 
    }
    function cerrarConecion($con){
    	 mysql_close($con);

    }
    function insertar($nombre,$telefono,$comunidad,$tg) {
    	
        
    }

  //   function borrar() {
  //   	mysqli_query($con,"DELETE FROM Persons WHERE LastName='Griffin'");
        
  //   }
  //   function actualizar() {
  //   	mysqli_query($con,"UPDATE Persons SET Age=36 WHERE FirstName='Peter' AND LastName='Griffin'");
        
  //   }
  //   function buscar() {
  //   	$result = mysqli_query($con,"SELECT * FROM Persons WHERE FirstName='Peter'");

		// while($row = mysqli_fetch_array($result))
		//   {
		//   echo $row['FirstName'] . " " . $row['LastName'];
		//   echo "<br>";
		//   }
        
  //   }
    function todos(){
    	$con=mysqli_connect("localhost","root","","movilamb");
    	
    	
    	$result = mysqli_query($con,"SELECT * FROM pacientes");

		while($row = mysqli_fetch_array($result) )
  		{
  				echo "<li>".$row['ID'] . " | " . $row['Nombre']." | ".$row["Numero"]." | ".$row["IDComunidad"]." | ".$row["TGestacion"];
  				echo "</li>";
   		 }
   		 $this->cerrarConecion($con);
	}
}

?> 