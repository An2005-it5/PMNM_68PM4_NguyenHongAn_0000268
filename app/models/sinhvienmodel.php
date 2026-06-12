<?php
require_once '../app/core/DB.php';

class SinhvienModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::Connect();
        $this->createTableIfNeeded();
    }

    private function createTableIfNeeded()
    {
        $sql = "CREATE TABLE IF NOT EXISTS sinhvien (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            MSSV VARCHAR(20) NOT NULL UNIQUE,
            HoTen VARCHAR(100) NOT NULL,
            GioiTinh VARCHAR(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        if (!$this->conn) return;
        $this->conn->exec($sql);
    }

    public function getAllSinhvien()
    {
        $stmt = $this->conn->prepare("SELECT * FROM sinhvien ORDER BY ID ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sinhvien WHERE ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isMssvExists($mssv, $excludeId = null)
    {
        $query = "SELECT COUNT(*) FROM sinhvien WHERE MSSV = :mssv";
        if ($excludeId !== null && intval($excludeId) > 0) {
            $query .= " AND ID != :id";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $mssv);
        if ($excludeId !== null && intval($excludeId) > 0) {
            $stmt->bindValue(':id', intval($excludeId), PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO sinhvien (MSSV, HoTen, GioiTinh) VALUES (:mssv, :hoten, :gioitinh)");
        $stmt->bindParam(':mssv', $data['mssv']);
        $stmt->bindParam(':hoten', $data['hoten']);
        $stmt->bindParam(':gioitinh', $data['gioitinh']);
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE sinhvien SET MSSV = :mssv, HoTen = :hoten, GioiTinh = :gioitinh WHERE ID = :id");
        $stmt->bindParam(':mssv', $data['mssv']);
        $stmt->bindParam(':hoten', $data['hoten']);
        $stmt->bindParam(':gioitinh', $data['gioitinh']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function paging($limit = 5, $offset = 0, $search = '')
    {
        if ($search !== '') {
            $searchTerm = '%' . $search . '%';
            $query = "SELECT * FROM sinhvien WHERE HoTen LIKE :search OR MSSV LIKE :search ORDER BY ID ASC LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        } else {
            $query = "SELECT * FROM sinhvien ORDER BY ID ASC LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindValue(':limit', intval($limit), PDO::PARAM_INT);
        $stmt->bindValue(':offset', intval($offset), PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($search !== '') {
            $countStmt = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien WHERE HoTen LIKE :search OR MSSV LIKE :search");
            $countStmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
            $countStmt->execute();
            $totalRecord = $countStmt->fetchColumn();
        } else {
            $totalRecord = $this->conn->query("SELECT COUNT(*) FROM sinhvien")->fetchColumn();
        }

        return [
            'sinhvien' => $result,
            'totalPage' => max(1, (int)ceil($totalRecord / $limit))
        ];
    }
}
?>
