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

    public function getComentarios($id_plato)
    {
        $query = $this->db->prepare(
            "SELECT * FROM comentarios WHERE id_plato = ? ORDER BY id_comentario DESC"
        );
        $query->execute(array($id_plato));
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function deleteComentario($id_comentario)
    {
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $query->execute(array($id_comentario));
    }

    public function deleteComentarios($id_plato)
    {
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_plato=?");
        $query->execute(array($id_plato));
    }

    public function getComentario($id_comentario)
    {
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $query->execute(array($id_comentario));
        $comentario = $query->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }

    public function getPromPuntuacion($id_plato)
    {
        $query = $this->db->prepare("SELECT AVG(ALL puntuacion) total FROM comentarios WHERE id_plato = ?");
        $query->execute(array($id_plato));
        $punt_prom = $query->fetch(PDO::FETCH_OBJ);
        return $punt_prom->total;
    }
}
