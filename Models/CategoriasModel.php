<?php

class CategoriasModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }	

    public function getCategorias(){
        $query = $this->db->prepare( "SELECT * FROM categoria");
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }
    
    public function getCategoria($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute(array($id));
        $categoria = $query->fetch(PDO::FETCH_OBJ);

        return $categoria;
    }

    public function addCategoria($tipo,$descripcion){
        $query = $this->db->prepare("INSERT INTO categoria(tipo, descripcion) VALUES(?,?)");
        $query->execute(array($tipo,$descripcion));
    }

    public function editarCategoria($id_categoria, $tipo, $descripcion){
        $query = $this->db->prepare("UPDATE categoria SET tipo = ?, descripcion = ?
        WHERE id_categoria = ?");
        $query->execute(array($tipo, $descripcion, $id_categoria));
    }

    public function deleteCategoria($id){
        $query = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $query->execute(array($id));
    }
}

?>