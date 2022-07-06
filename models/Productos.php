<?php
//Archivo para realizar las transacciones en las tablas

//Clase general para los productos
class Producto extends Conectar{
    //Recupera TODOS los productos de la tabla, donde esta es 1
    public function get_producto(){
        $conectar=parent::connection();
        parent::set_names();
        $sql="SELECT id , nombre, marca, precio, descripcion FROM productos WHERE estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
        //Recupera un Sólo registro de la tabla producto
        public function get_producto_id($id_producto){
            $conectar=parent::connection();
            parent::set_names();
            $sql="SELECT id , nombre, marca, precio, descripcion FROM productos WHERE estado=1 AND id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id_producto);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
        //insertar un nuevo productos
        public function insert_producto_id($nombre,$marca,$descripcion,$precio){
            $conectar=parent::connection();
            parent::set_names();
            $sql="INSERT INTO productos (id, nombre, marca, descripcion, precio, estado) VALUES (NULL, ?, ?, ?, ?, '1')";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$marca);
            $sql->bindValue(3,$descripcion);
            $sql->bindValue(4,$precio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        // Actualizar los datos  de un productos
        public function update_producto_id($nombre,$marca,$descripcion,$precio,$id){
            $conectar=parent::connection();
            parent::set_names();
            $sql="UPDATE productos SET  nombre= ?, marca = ?, descripcion = ?, precio=? WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$marca);
            $sql->bindValue(3,$descripcion);
            $sql->bindValue(4,$precio);
            $sql->bindValue(5,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        // Borrador logico  un producto
        public function delete_producto_id($id){
            $conectar=parent::connection();
            parent::set_names();
            $sql="UPDATE productos SET  estado =0 WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //Borrador fisico
        public function kill_producto_id($id){
            $conectar=parent::connection();
            parent::set_names();
            $sql="DELETE FROM productos WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function get_sucursales(){
            $conectar=parent::connection();
            parent::set_names();
            $sql="SELECT id ,ip, sucursal FROM sucursales";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
        
    
}
?>