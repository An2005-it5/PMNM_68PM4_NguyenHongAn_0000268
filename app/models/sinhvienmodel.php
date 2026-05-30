<?php
require_once __DIR__ . '/../core/DB.php';

class Sinhvienmodel
{
    private $db;

    public function __construct()
    {
        $connect = new Connectdatabase();
        $this->db = $connect->Connect();
    }

    public function getAll()
    {
        $stmt = $this->db->query('SELECT * FROM sinhvien');
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM sinhvien WHERE ID = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data)
    {
        $stmt = $this->db->prepare('INSERT INTO sinhvien (ID, MSSV, HoTen, GioiTinh) VALUES (:id, :mssv, :hoten, :gioitinh)');
        return $stmt->execute([
            'id' => $data['ID'] ?? null,
            'mssv' => $data['MSSV'] ?? '',
            'hoten' => $data['HoTen'] ?? '',
            'gioitinh' => $data['GioiTinh'] ?? '',
        ]);
    }
}

