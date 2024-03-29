<?php
abstract class ApiController {
    protected $model;
    protected $view;
    private $data; 

    function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    function getData() { 
        return json_decode($this->data); 
    }  
}
