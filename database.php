<?php 
class database{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "malasngoding";
    
 
	function __construct(){
         mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    }
    
 
	function tampil_data(){
        // Lakukan kueri ke database
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        $data = mysqli_query($conn, "SELECT * FROM user");
        // Ambil data dan simpan dalam array
        $hasil = array();
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
    
        // Tutup koneksi
        mysqli_close($conn);
    
        return $hasil;
    }
    function input($nama, $alamat, $usia){
        // Lakukan koneksi ke database
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    
        // Periksa koneksi
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    
        // Escape input untuk menghindari SQL injection
        $nama = mysqli_real_escape_string($conn, $nama);
        $alamat = mysqli_real_escape_string($conn, $alamat);
        $usia = mysqli_real_escape_string($conn, $usia);
    
        // Lakukan penyisipan data ke dalam tabel
        $query = "INSERT INTO user (nama, alamat, usia) VALUES ('$nama', '$alamat', '$usia')";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    
        // Tutup koneksi
        mysqli_close($conn);
    }
    function hapus($id){
        // Lakukan koneksi ke database
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    
        // Periksa koneksi
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    
        // Escape input untuk menghindari SQL injection
        $id = mysqli_real_escape_string($conn, $id);
    
        // Lakukan penghapusan data berdasarkan id
        $query = "DELETE FROM user WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil dihapus";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    
        // Tutup koneksi
        mysqli_close($conn);
    }
    function edit($id){
        // Lakukan koneksi ke database
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    
        // Periksa koneksi
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    
        // Escape input untuk menghindari SQL injection
        $id = mysqli_real_escape_string($conn, $id);
    
        // Lakukan kueri untuk mengambil data berdasarkan id
        $query = "SELECT * FROM user WHERE id='$id'";
        $result = mysqli_query($conn, $query);
    
        // Periksa apakah kueri berhasil
        if (!$result) {
            die("Kueri gagal: " . mysqli_error($conn));
        }
    
        // Ambil data dan simpan dalam array
        $hasil = array();
        while ($d = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $hasil[] = $d;
        }
    
        // Bebaskan hasil kueri
        mysqli_free_result($result);
    
        // Tutup koneksi
        mysqli_close($conn);
    
        return $hasil;
    }
    function update($id, $nama, $alamat, $usia){
        // Lakukan koneksi ke database
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    
        // Periksa koneksi
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    
        // Escape input untuk menghindari SQL injection
        $id = mysqli_real_escape_string($conn, $id);
        $nama = mysqli_real_escape_string($conn, $nama);
        $alamat = mysqli_real_escape_string($conn, $alamat);
        $usia = mysqli_real_escape_string($conn, $usia);
    
        // Lakukan update data dalam tabel
        $query = "UPDATE user SET nama='$nama', alamat='$alamat', usia='$usia' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil diperbarui";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    
        // Tutup koneksi
        mysqli_close($conn);
    }
    
    
    
    
}