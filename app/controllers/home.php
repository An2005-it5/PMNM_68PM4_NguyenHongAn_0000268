<?php
class home extends Controller
{
  public function index()
  {
    $viewname = 'home/index';
    require_once '../app/views/layout/masterlayout.php';
  }

  public function about()
  {
    $viewname = 'home/about';
    require_once '../app/views/layout/masterlayout.php';
  }

  public function login()
  {
    $error = $_SESSION['error'] ?? '';
    if (!empty($error)) unset($_SESSION['error']);
    require_once '../app/views/home/login.php';
  }
}