<?php
class PlatosModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

    public function getPlatos() {
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

    public function addPlato($nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria) {
        $query = $this->db->prepare(
            'INSERT INTO plato(nombre,vegetariano,tacc,vegano,precio,id_categoria)
            VALUES(?,?,?,?,?,?)'
        );
        $query->execute(array($nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria));
    }

    public function editarPlato($id_plato, $nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria) {
        $query = $this->db->prepare(
            'UPDATE plato
            SET nombre = ?, vegetariano = ?, tacc = ?, vegano = ?, precio = ?, id_categoria = ?
            WHERE id_plato = ?'
        );
        $query->execute(array($nombre, $vegetariano, $tacc, $vegano, $precio, $id_categoria, $id_plato));
    }

    public function deletePlato($id) {
        $query = $this->db->prepare("DELETE FROM plato WHERE id_plato=?");
        $query->execute(array($id));
    }

    public function addImage($image, $id_plato) {
        $query = $this->db->prepare("INSERT INTO images(`image`, id_plato) VALUES(?,?)");
        $query->execute(array($image, $id_plato));
    }

    public function getImages($idPlato) {
        $query = $this->db->prepare(
            'SELECT images.image, images.id
            FROM images
            INNER JOIN plato
            ON plato.id_plato=images.id_plato
            WHERE images.id_plato = ?'
        );
        $query->execute(array($idPlato));
        $image = $query->fetchAll(PDO::FETCH_OBJ);
        return $image;
    }

    public function deleteImage($id_image) {
        $query = $this->db->prepare("DELETE FROM images WHERE id=?");
        $query->execute(array($id_image));
    }

    /**
     * getIdPlatoImage($id_image): 
     *  Dado el id de una imagen, esta función devuelve el id del plato
     *  correspondiente a esa imagen.
     */
    public function getIdPlatoImage($id_image) {
        $query = $this->db->prepare(
            'SELECT images.id_plato
            FROM images
            WHERE images.id = ?'
        );
        $query->execute(array($id_image));
        $imagen = $query->fetch(PDO::FETCH_OBJ);
        return $imagen->id_plato;
    }

    public function getImageName($id_image) {
        $query = $this->db->prepare(
            'SELECT images.image
            FROM images
            WHERE images.id = ?'
        );
        $query->execute(array($id_image));
        $imagen = $query->fetch(PDO::FETCH_OBJ);
        return $imagen->image;
    }
}
