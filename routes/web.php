<?php

use App\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/catalogo', function () {
    return view ('productos.catalogo');
});

Route::get('/', function () {
    return view ('productos.catalogo');
});

Route::get('venta/{idProducto?}', function ($idProducto = 'sin numero') {
    $Cantidad = 0;
$servername = "localhost";
$database = "_muebleria";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

//$idProducto = $_GET['idProducto'];

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else{
/*echo "Connected successfully";
echo $idProducto;*/
$sql =  "SELECT cantidad, precio FROM productos WHERE idproducto=$idProducto";

$resultado = mysqli_query ($conn,$sql);
if(!$resultado){//COMPRUEBA QUE SE ENCONTRO EL PRODUCTO
    echo "0";
    }else{
        $fila = mysqli_fetch_assoc($resultado);
        if($fila['cantidad'] == 0){//VALIDA QUE HAY PRODUCTO EN EXISTENCIA PARA VENDER
            mysqli_close($conn);//CIERRA LA CONEXION, NO HAY PRODUCTO
            return redirect('productos')->with('Mensaje3','No hay existencias');//CASO 3: NO HAY EXISTENCIAS, NO HAY VENTA
        }
        else{//DE LO CONTRARIO QUE EXISTA ALMENOS UN PRODUCTO: 
        $Cantidad = $fila['cantidad'];//CANTIDAD ES IGUAL A CANTIDAD DE LA BD
        $Cantidad = $Cantidad-1;//LE RESTAMOS 1 DEL PRODUCTO QUE SE VENDIO
        $sql2 = "UPDATE productos SET cantidad=$Cantidad WHERE idproducto=$idProducto";//ACTUALIZAMOS LAS EXISTENCIAS
        if($conn->query($sql2) === TRUE){//COMPROBAMOS QUE SE ACTUALIZARON LAS EXISTENCIAS
            echo "1";
            if($Cantidad <= 3){//SI EN LA ACTUALIZACION DE EXISTENCIAS BAJO A 3 ENTRAMOS A ESTE CODIOG PARA ENVIAR LA ALERTA
                $Precio = $fila['precio'];//PRECIO ES IGUAL A PRECIO DE LA BD
                //date_default_timezone_set('America/Los_Angeles');
                date_default_timezone_set('America/Mexico_City');
                $fecha_actual=date("Y-m-d H-i:s");
                $sql3 = "INSERT INTO ventas(idProducto, total, created_at) VALUES ('$idProducto', '$Precio', '$fecha_actual')";//GENERA EL TICKET DE VENTA
                if ($conn->query($sql3) === TRUE) {//COMPRUEBA QUE SE GENERO EL TICKET
                    mysqli_close($conn);//CIERRA LA CONEXION
                    return redirect('productos')->with('Mensaje2','Producto vendido, PRECAUCION QUEDAN '.$Cantidad.' PRODUCTOS CON EL ID '.$idProducto);// CASO 2: ALERTA DE EXISTENCIA BAJA, SI HAY VENTA
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                
            }else{//DE LO CONTRARIO, SI CANTIDAD NO ES IGUAL A 3, SIMPLEMENTE SE HACE UNA VENTA
                $Precio = $fila['precio'];
                //date_default_timezone_set('America/Los_Angeles');
                 date_default_timezone_set('America/Mexico_City');
                $fecha_actual=date("Y-m-d H:i:s");
                $sql3 = "INSERT INTO ventas(idProducto, total, created_at) VALUES ('$idProducto', '$Precio', '$fecha_actual')";//GENERA EL TICKET DE VENTA
                    if ($conn->query($sql3) === TRUE) {//COMPRUEBA QUE SE GENERO EL TICKET
                        mysqli_close($conn);//CIERRA LA CONEXION
                        return redirect('productos')->with('Mensaje','Producto vendido');   //CASO 1: EXISTENCIA ESTABLE, SI HAY VENTA     
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                               }
            }
        }else{
            echo "0".$conn->error;
        }
    }
    }

}

});


Route::resource('ventas', 'VentaController')->middleware('auth');

Route::resource('empleados', 'EmpleadosController')->middleware('auth');

Route::resource('productos', 'ProductosController')->middleware('auth');

Route::view('login', 'login')->name('inicio-sesion');

Auth::routes(['reset'=>false, 'register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
