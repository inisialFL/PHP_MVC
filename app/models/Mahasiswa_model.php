<?php

class Mahasiswa_model {
	// private $mhs = [
	// 	[
	// 		"Nama" => "Fitri Lestari",
	// 		"NIM" => "1755201228",
	// 		"Email" => "549.fitrilestari@gmail.com",
	// 		"Prodi" => "Teknik Informatika"
	// 	],
	// 	[
	// 		"Nama" => "Artiyas Dwi Yuliyanti",
	// 		"NIM" => "1755201227",
	// 		"Email" => "artiyas@gmail.com",
	// 		"Prodi" => "Teknik Informatika"
	// 	],
	// 	[
	// 		"Nama" => "Risya Zurita Rahmadani",
	// 		"NIM" => "1755201226",
	// 		"Email" => "risya@gmail.com",
	// 		"Prodi" => "Teknik Informatika"
	// 	]
	// ];

	//MENGAMBIL DATA DARI DATABASE
	//
	// private $dbh; //database handler untuk menampung koneksi ke database
	// private $stmt; //untuk menyimpan query

	// public function __construct() {
	// 	$dsn = 'mysql:host=localhost;dbname=phpmvc'; //data source name untuk identitas server

	// 	try {
	// 		$this->dbh = new PDO($dsn, 'root', '');
	// 	} catch(PDOException $e) {
	// 		die($e->getMessage());
	// 	}
	// }

	private $table = 'mahasiswa';
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getAllMahasiswa() {
		// $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		// $this->stmt->execute();

		// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMahasiswaById($id) {
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);

		return $this->db->single();
	}

	public function tambahDataMahasiswa($data) {
		$query = "INSERT INTO mahasiswa 
					VALUES 
				  ('', :nama, :npm, :email, :jurusan)";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('npm', $data['npm']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);

		$this->db->execute();

		return $this->db->rowCount();

		//return 0;
	}
} 