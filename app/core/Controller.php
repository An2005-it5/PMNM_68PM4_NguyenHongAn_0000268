<?php
//controller cơ sở để các controller khác kế thừa
Class controller{
    //kết nối model
    public function model($model){
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model;
    }
    //kết nối view
    public function view($viewname, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/' . $viewname . '.php';
    }
}
