<?php
class ImageModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

    public function addImage($image, $id_plato)
    {
        $query = $this->db->prepare("INSERT INTO images(`image`, id_plato) VALUES(?,?)");
        $query->execute(array($image, $id_plato));
    }

    public function getImages($idPlato)
    {
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

    public function deleteImage($id_image)
    {
        $query = $this->db->prepare("DELETE FROM images WHERE id=?");
        $query->execute(array($id_image));
    }

    public function deleteImages($id_plato)
    {
        // 1. traigo todas las imagenes que coincidan con $id_plato
        $images = $this->getImages($id_plato);
        // 2. de cada una hago el unlink de la carpeta
        foreach($images as $image) {
            unlink('images/platos/' . $image->image . '');
        }
        // 3. borro las imagenes de la base de datos
        $query = $this->db->prepare("DELETE FROM images WHERE id_plato=?");
        $query->execute(array($id_plato));
    }

    /** 
     *  Dado el id de una imagen, esta función devuelve el id del plato
     *  correspondiente a esa imagen.
     */
    public function getIdPlatoImage($id_image)
    {
        $query = $this->db->prepare(
            'SELECT images.id_plato
            FROM images
            WHERE images.id = ?'
        );
        $query->execute(array($id_image));
        $imagen = $query->fetch(PDO::FETCH_OBJ);
        return $imagen->id_plato;
    }

    public function getImageName($id_image)
    {
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
