<?php
require_once '../app/midleware.php';
$middleware = new midleware();
$middleware->checkLogin();
$app = new app();
?>