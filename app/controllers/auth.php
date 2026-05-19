<?php
     class auth {
        protected $user =[
            "nguyenhongan"=> "01666456375",
            "admin"=> "1234567"
        ];
    
         public function login() {
            $baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
            
            // Xử lý đăng nhập
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ form đăng nhập
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
    
                if (isset($this->user[$username]) && $this->user[$username] === $password) {
                    $_SESSION['username'] = $username;
                    // Chuyển hướng đến trang chủ sau khi đăng nhập thành công
                    header("Location: " . $baseUrl . "home/index");
                    exit();
                } 
            }
            
            // Chuyển hướng đến trang đăng nhập nếu không phải là POST hoặc sai mật khẩu
            header("Location: " . $baseUrl . "home/login");
            exit();
         }
     }


