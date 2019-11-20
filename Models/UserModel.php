<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

    /**
     * getByUsername($username):
     *  Retorna un usuario según el username pasado por parámetro.
     */
    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute(array($username));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addUser($user, $password) {
        $administrador = 0;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->prepare(
            "INSERT INTO usuarios(username, `password`, administrador)
            VALUES (?,?,?)"
        );
        $query->execute(array($user, $hash, $administrador));
    }

    public function getUsuarios() {
        $query = $this->db->prepare(
            'SELECT
            id_usuario, username, administrador
            FROM usuarios
            ORDER BY id_usuario, username ASC'
        );
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    public function getUser($id_user) {
        $query = $this->db->prepare(
            'SELECT * FROM usuarios WHERE id_usuario = ?'
        );
        $query->execute(array($id_user));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function editarPlato($id_user, $admin) {
        $query = $this->db->prepare(
            'UPDATE usuarios SET administrador = ? WHERE id_usuario = ?'
        );
        $query->execute(array($admin, $id_user));
    }

    public function deleteUser($id_user) {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $query->execute(array($id_user));
    }

    /**
     * isTaken($username):
     *  Esta función revisa si existe o no un 'username' determinado en la tabla 'usuarios'.
     */
    public function isTaken($username)
    {
        $query = $this->db->prepare(
            "SELECT `username` FROM `usuarios` WHERE username=?"
        );
        $query->execute(array($username));
        $user = $query->fetch(PDO::FETCH_OBJ);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}
