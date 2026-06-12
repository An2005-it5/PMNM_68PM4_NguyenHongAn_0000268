<?php
class auth
{
    protected $user = [
        'nguyenhongan' => '0000268',
        'admin' =>'12345678'    
    ];

    private function baseUrl()
    {
        return str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . $this->baseUrl() . 'home/login');
            exit();
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (isset($this->user[$username]) && $this->user[$username] === $password) {
            $_SESSION['username'] = $username;
            // Release session lock so concurrent asset requests aren't blocked
            session_write_close();
            header('Location: ' . $this->baseUrl() . 'home/index');
            exit();
        }

        $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không đúng.';
        header('Location: ' . $this->baseUrl() . 'home/login');
        exit();
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . $this->baseUrl() . 'home/login');
        exit();
    }
}
?>
