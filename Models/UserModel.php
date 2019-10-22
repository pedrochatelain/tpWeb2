<?php

class UserModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=restaurant_np;charset=utf8', 'root', 'root');
    }

    /**
     * Retorna un usuario según el username pasado.
     */
    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute(array($username));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
        $query->execute(array($id));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addUser() {
        $user = 'pedrochatelain@gmail.com';
        $password = 'contrasena';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->prepare('INSERT INTO usuarios(`username`, `password`) VALUES (?,?)');
        $query -> execute(array($user, $hash));
    }

}