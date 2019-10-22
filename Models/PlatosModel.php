<?php

class PlatosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

	public function getPlatos(){
        $sentencia = $this->db->prepare( 'SELECT * FROM plato ORDER BY id_categoria ASC');
        $sentencia->execute();
        $platos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $platos;
    }

    public function get($idPlato) {
        $query = $this->db->prepare('SELECT * FROM plato WHERE id_plato = ?');
        $query->execute(array($idPlato));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addPlato($tipo,$nombre,$vegetariano,$tacc,$vegano,$precio,$id_categoria){
        $sentencia = $this->db->prepare("INSERT INTO plato(tipo, nombre,vegetariano,tacc,vegano,precio,id_categoria) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array(strtoupper($tipo),strtoupper($nombre),strtoupper($vegetariano),strtoupper($tacc),strtoupper($vegano),$precio,$id_categoria));
    }

    public function editarPlato($id_plato, $tipo,$nombre,$vegetariano,$tacc,$vegano,$precio,$id_categoria){
        $sentencia = $this->db->prepare("UPDATE plato SET tipo = ?, nombre = ?, vegetariano = ?, tacc = ?, vegano = ?, precio = ?, id_categoria = ?
        WHERE id_plato = ?");
        $sentencia->execute(array(strtoupper($tipo),strtoupper($nombre),strtoupper($vegetariano),strtoupper($tacc),strtoupper($vegano),$precio,$id_categoria,$id_plato));
    }

    public function deletePlato($id){
        $sentencia = $this->db->prepare("DELETE FROM plato WHERE id_plato=?");
        $sentencia->execute(array($id));
    }
}

?>