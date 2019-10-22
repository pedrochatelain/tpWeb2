<?php

class CategoriasModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }	

    public function getCategorias(){
        $query = $this->db->prepare( "SELECT * FROM categoria");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoriaByID($id) {
        //dado un id, devuelve el nombre de la categoria
        $sentencia = $this->db->prepare( "SELECT * FROM categoria where id_categoria = $id");
        $sentencia -> execute();
        $cat = $sentencia->fetch(PDO::FETCH_OBJ);
        return $cat;
    }
    
    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute(array($id));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addCategoria($tipo,$descripcion){
        $sentencia = $this->db->prepare("INSERT INTO categoria(tipo, descripcion) VALUES(?,?)");
        $sentencia->execute(array(strtoupper($tipo),strtoupper($descripcion)));
    }

    public function editarCategoria($id_categoria, $tipo, $descripcion){
        $sentencia = $this->db->prepare("UPDATE categoria SET tipo = ?, descripcion = ?
        WHERE id_categoria = ?");
        $sentencia->execute(array(strtoupper($tipo), strtoupper($descripcion), $id_categoria));
    }

    public function deleteCategoria($id){
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id));
    }
}

?>