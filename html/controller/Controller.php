<?php
include_once("model/Model.php");

// remember phtml files

class IndexController{
    public $model;
    public function __construct() 
    {
        $this->model = new Model();
    }

    public function invoke()
    {

    }
}
?>