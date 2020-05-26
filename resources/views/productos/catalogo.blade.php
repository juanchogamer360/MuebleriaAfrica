@extends('layouts.app')

@section('content')

<div class="container">

<?php
$servername = "localhost";
$database = "_muebleria";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql =  "SELECT idProducto, nombre, color, cantidad, precio, categoria, descripcion, material, modelo, foto FROM productos";
    
    $resultado = mysqli_query ($conn,$sql);
    
if(!$resultado){
    echo "0";
    }else{
        
            
echo "<table class='table table-light table-hover'>";
  echo "<thead class='thead-light'>";
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>COLOR</th>";
        echo "<th>CANTIDAD</th>";
        echo "<th>PRECIO</th>";
        echo "<th>CATEGORIA</th>";
        echo "<th>DESCRIPCION</th>";
        echo "<th>MATERIAL</th>";
        echo "<th>MODELO</th>";
        echo "<th>FOTO</th>";
    echo "</tr>";
  echo "</thead>";
  while  ($fila = mysqli_fetch_assoc($resultado))
  {
echo "<tbody>";
   
            
    echo  "<tr>";
      echo   '<td>'.$fila['idProducto'].'</td>';
      echo   '<td>'.$fila['nombre'].'</td>';
      echo   '<td>'.$fila['color'].'</td>';
      echo   '<td>'.$fila['cantidad'].'</td>';
      echo   '<td>$'.$fila['precio'].'</td>';
      echo   '<td>'.$fila['categoria'].'</td>';
      echo   '<td>'.$fila['descripcion'].'</td>';
      echo   '<td>'.$fila['material'].'</td>';
      echo   '<td>'.$fila['modelo'].'</td>'; 
    //echo   "<td><img src='/storage/app/public/".$fila['foto']."'></td>";     
      echo   "<td><img src='". asset ('storage'). "/".$fila['foto']."'width='100'></td>";     
      
     
     
         
    echo '</tr>';
  
echo '</tbody>';
  }
echo '</table>';

      
    }
mysqli_close($conn);
?>

</div>
@endsection