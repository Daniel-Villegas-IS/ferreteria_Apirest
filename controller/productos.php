<?php
//Encabezado para que php reconozca que se van a intercambiar archivos JSON
header('content-Type: application/json');
//Este archivo será el controlador del API REST, aquí se realizara las operaciones del CRUD
//Create,Read,Update,Delete.

require_once "../config/conexion.php";
require_once "../models/Productos.php";
//Recibe solicitudes de la URI
$body=json_decode(file_get_contents("php://input"), true);
//instanciar el objeto producto.
//se ocupara para realizar las acciones del API
$producto=new Producto();
//Crear el webservice que realice las acciones CRUD por medio de la APIREST, el swich será el encargado de atender a las peticiones.
switch($_GET["opcion"]){
    //Este caso recupera todos los datos de la tabla productos
    //La información es recuperada  de lo que indica el archivo
    //models->Productos.php->metodo get_producto();
    case "getAll";
    $datos =$producto->get_producto();
    //una vez recuperados los datos se les da formato json
    echo json_encode($datos);
    break;

    //Para recuperar un registro se ocupa el get que tiene el id del producto
    case "get":
        $datos=$producto->get_producto_id($body["id"]); // el id Corresponde al de la tabla al consultar.
        echo json_encode($datos);
        break;
    //para insetar un registro se deben mandar los campos en el JSON
    case "insert":
        $datos=$producto->insert_producto_id($body["nombre"],$body["marca"],$body["descripcion"],$body["precio"]); // el id Corresponde al de la tabla al consultar.
        echo json_encode("producto Insertado :) 😍😍👙👙");
        break;
    //para actualizar un registro
    case "update":
        $datos=$producto->update_producto_id($body["nombre"],$body["marca"],$body["descripcion"],$body["precio"],$body["id"]); // el id Corresponde al de la tabla al consultar.
        echo json_encode("producto Actualizado, Bachoco papi Bachocoo!!! :) 😍😍👙👙");
        break;
     //para HACER UN BORRADO logico de un registro
    case "delete":
        $datos=$producto->delete_producto_id($body["id"]); // el id Corresponde al de la tabla al consultar.
        echo json_encode("producto Eliminado, saca la bacha eseee!!! :) 👽👻👻");
        break;
    //para HACER UN BORRADO FISICO de un registro
    case "kill":
        $datos=$producto->kill_producto_id($body["id"]); // el id Corresponde al de la tabla al consultar.
        echo json_encode("producto Eliminado para siempreee!!! :) 👽👻👻");
        break;
        //creacion get
        case "getSucursales":
            $datos=$producto->get_sucursales(); // el id Corresponde al de la tabla al consultar.
            echo json_encode($datos);
            break;
        
}
?>