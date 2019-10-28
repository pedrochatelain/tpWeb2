<?php

class PlatosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

    public function getPlatos() {
        /*
            Esta función devuelve todos los datos de cada plato, o sea
            id_plato, nombre, categoria, vegetariano, vegano, tacc y precio
            (ordenados ascendentemente por id_categoria y nombre del plato)
        */

        $query = $this->db->prepare(
            'SELECT
            plato.id_plato, plato.nombre, categoria.tipo, plato.vegetariano,
            plato.vegano, plato.tacc, plato.precio
            FROM plato
            INNER JOIN categoria
            ON plato.id_categoria=categoria.id_categoria
            ORDER BY categoria.id_categoria, plato.nombre ASC'
        );

        $query->execute();
        $platos = $query->fetchAll(PDO::FETCH_OBJ);

        return $platos;
    }

    public function get($idPlato) {
        /*
            Devuelve nombre, categoria, vegetariano, vegano, tacc y precio
            correspondiente al id del plato pasado como parámetro
        */

        $query = $this->db->prepare(
            'SELECT plato.id_plato, plato.nombre, categoria.tipo, plato.vegetariano,
            plato.vegano, plato.tacc, plato.precio
            FROM plato
            INNER JOIN categoria
            ON plato.id_categoria=categoria.id_categoria
            WHERE plato.id_plato = ?'
        );

        $query->execute(array($idPlato));
        $plato = $query->fetch(PDO::FETCH_OBJ);

        return $plato;
    }

    public function addPlato($nombre,$vegetariano,$tacc,$vegano,$precio,$id_categoria){
        $query = $this->db->prepare(
            'INSERT INTO plato(nombre,vegetariano,tacc,vegano,precio,id_categoria)
            VALUES(?,?,?,?,?,?)'
        );

        $query->execute(array($nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria));
    }

    public function editarPlato($id_plato,$nombre,$vegetariano,$tacc,$vegano,$precio,$id_categoria){
        // edita los datos del plato dado un id
        
        $query = $this->db->prepare(
            'UPDATE plato
            SET nombre = ?, vegetariano = ?, tacc = ?, vegano = ?, precio = ?, id_categoria = ?
            WHERE id_plato = ?'
        );

        $query->execute(array($nombre,$vegetariano,$tacc,$vegano,$precio,$id_categoria,$id_plato));
    }

    public function deletePlato($id){
        $query = $this->db->prepare("DELETE FROM plato WHERE id_plato=?");

        $query->execute(array($id));
    }
}

?>