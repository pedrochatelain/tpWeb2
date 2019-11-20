<?php
class ComentariosModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

    public function addComentario($usuario, $mensaje, $puntuacion, $id_plato)
    {
        $query = $this->db->prepare(
            'INSERT INTO comentarios(usuario, mensaje, puntuacion, id_plato)
            VALUES(?,?,?,?)'
        );
        $query->execute(array($usuario, $mensaje, $puntuacion, $id_plato));
    }

    public function getComentarios($id_plato){
        $query = $this->db->prepare( "SELECT * FROM comentarios WHERE id_plato = ?");
        $query->execute(array($id_plato));
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }
}
