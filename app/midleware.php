<?php
require_once '../app/core/app.php';
session_start();
     class midleware {
        function checkLogin() {
            // Lấy đường dẫn hiện tại từ $_GET['url'] (đã được .htaccess xử lý)
            $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
            $publicPages = ['home/login', 'auth/login'];

            // Kiểm tra nếu người dùng chưa đăng nhập và đang truy cập vào trang không công khai
            if (!isset($_SESSION['username']) && !in_array($url, $publicPages)) {
                // Tự động lấy thư mục gốc của project (vd: /QLSV.php/public/) thay vì root domain
                $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
                header('Location: ' . $baseUrl . 'home/login');
                exit();
            }
        }
     }