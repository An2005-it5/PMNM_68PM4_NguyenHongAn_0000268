<?php
require_once '../app/core/Controller.php';

class sinhvien extends controller {
    public function index() {
        $sinhvienmodel = $this->model('sinhvienmodel');
        $sinhviens = $sinhvienmodel->getAll();

        $this->view('sinhvien/index', ['sinhviens' => $sinhviens]);
    }
}
