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
    
    public function addUser() {
        // agrega un usuario a la base de datos
        $username = "guest";
        $password = "1234";
        $administrador = 0;
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $this->db->prepare(
            "INSERT INTO usuarios(username, `password`, administrador)
            VALUES (?,?,?)"
        );
        $query->execute(array($username, $hash, $administrador));
    }
}