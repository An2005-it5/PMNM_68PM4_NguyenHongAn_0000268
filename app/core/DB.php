<?php
class ConnectDB{
    private static $host = 'localhost';
    private static $db_name = '68pm34';
    private static $username = 'root';
    private static $password = '';
    public static $conn;

    public static function Connect(){
        $conn = null;
        try{
            $conn = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$db_name . ';charset=utf8mb4', self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $conn;
    }
}
?>
        
