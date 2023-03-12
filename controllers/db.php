<?php
    // Cara ke 1
    class database {
        private $koneksi;
        public function __construct()
        {
            $this->koneksi = new mysqli('localhost','root','','perpustakaan_v2');
        if (mysqli_connect_error()){
            echo 'gagal';
        }
        }
        public function proses_login($username,$password){
            $login_query = $this->koneksi->query("SELECT * FROM users
            WHERE username='$username' AND password=md5('$password')");
            $data = $login_query->fetch_object();
            $count = $login_query->num_rows;
            if ($count > 0){
                session_start();
                $_SESSION['login']    = 1;
                $_SESSION['username'] = $data->username;
                $_SESSION['level']    = $data->level;
                $_SESSION['nis']      = $data->nis;
                header("location:../dashboard.php");
            }else {
                session_start();
                $_SESSION['warning'] = 'Silahkan Masukkan password atau email anda';
                header("location:../login.php");
            }
        }
        public function proses_logout(){
            session_start();
            session_destroy();
            session_start();
            $_SESSION['success'] = 'Anda berhasil Logout';
            header("location:../login.php");
        }

        public function list_users(){
            $query = $this->koneksi->query("SELECT * FROM users");
            while($list = $query->fetch_object()){
                $hasil[] = $list;
            }
            return $hasil;
        }
        public function proses_simpan_user($uname,$pwd){
            $query = $this->koneksi->query("INSERT INTO users VALUES(null,'$uname',md5('$pwd'),'petugas','0')");
            if ($query){
                session_start();
                $_SESSION['success'] = 'Data user berhasil';
                header("location:../dashboard.php?pages=users");
            }
        }
        public function proses_tampil_user($user_id){
            $query = $this->koneksi->query("SELECT * FROM users where user_id='$user_id'");
            return $query->fetch_object();
        }
        public function proses_ubah_user($uname,$pwd,$user_id){
            if($pwd == null){
                $this->koneksi->query("UPDATE users set username='$uname' WHERE user_id='$user_id'");
                session_start();
                $_SESSION['success'] = 'Data user berhasil diubah';
                header("location:../dashboard.php?pages=users");
            }else {
                $this->koneksi->query("UPDATE users set username='$uname',password=md5('$pwd') WHERE user_id='$user_id'");
                session_start();
                $_SESSION['success'] = 'Data user berhasil diubah';    
                header("location:../dashboard.php?pages=users");
            }
        }
        public function proses_hapus_user($id){
            $this->koneksi->query("DELETE from users where user_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data user berhasil dihapus';   
            header("location:../dashboard.php?pages=users");
        }
        public function menghitung_users(){
            $query = $this->koneksi->query("SELECT * FROM users");
            return $query->num_rows;
        }

        // Siswa
        public function proses_hapus_siswa($id){
            $this->koneksi->query("DELETE from siswa where siswa_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data siswa berhasil dihapus';   
            header("location:../dashboard.php?pages=siswa");
        }
        public function proses_tampil_siswa($siswa_id){
            $query = $this->koneksi->query("SELECT * FROM siswa where siswa_id='$siswa_id'");
            return $query->fetch_object();
        }
        public function list_siswa(){
            $query = $this->koneksi->query("SELECT * FROM siswa");
            while($list = $query->fetch_object()){
                $hasil[] = $list;
            }
            return $hasil;
        }
        public function proses_simpan_siswa($nisn,$nama,$kelas,$gambar){
            $query = $this->koneksi->query("INSERT INTO siswa VALUES(null,'$nisn','$nama','$kelas','$gambar')");
            if ($query){
                $query2 = $this->koneksi->query("INSERT INTO users VALUES(null,'$nisn',md5('$nisn'),'Siswa','$nisn')");
                move_uploaded_file($_FILES['gambar']['tmp_name'],'../assets/img/gambar/' . $gambar);
                session_start();
                $_SESSION['success'] = 'Data siswa berhasil ditambah';
                header("location:../dashboard.php?pages=siswa");
            }
            
        }
        public function menghitung_siswa(){
            $query = $this->koneksi->query("SELECT * FROM siswa");
            return $query->num_rows;
        }
        public function proses_ubah_siswa($nisn,$nama,$kelas,$siswa_id,$gambar){
            if ($gambar == null) {
                $this->koneksi->query("UPDATE siswa set nisn='$nisn',nama_siswa='$nama', kelas='$kelas' WHERE siswa_id='$siswa_id'");
                session_start();
                $_SESSION['success'] = 'Data siswa berhasil diubah';
                header("location:../dashboard.php?pages=siswa");
            }else {
                move_uploaded_file($_FILES['gambar']['tmp_name'],'../assets/img/gambar/' . $gambar);
                $this->koneksi->query("UPDATE siswa set nisn='$nisn',nama_siswa='$nama', kelas='$kelas',foto='$gambar' WHERE siswa_id='$siswa_id'");
                session_start();
                $_SESSION['success'] = 'Data siswa berhasil diubah';
                header("location:../dashboard.php?pages=siswa");
            }      
        }
        // Buku
        public function list_buku(){
            $query = $this->koneksi->query("SELECT * FROM buku");
            while($list = $query->fetch_object()){
                $hasil[] = $list;
            }
            return $hasil;
        }
        public function proses_simpan_buku($judul,$deskripsi,$penulis,$penerbit,$gambar){
            if($gambar == null){
                $query = $this->koneksi->query("INSERT INTO buku VALUES(null,'$judul','$deskripsi','$penulis','$penerbit','default.jpg')");
                session_start();
                $_SESSION['success'] = 'Data buku berhasil ditambah';
                header("location:../dashboard.php?pages=buku");
            }else{
                $query = $this->koneksi->query("INSERT INTO buku VALUES(null,'$judul','$deskripsi','$penulis','$penerbit','$gambar')");
            if ($query){
                move_uploaded_file($_FILES['gambar']['tmp_name'],'../assets/img/gambar/' . $gambar);
                session_start();
                $_SESSION['success'] = 'Data buku berhasil ditambah';
                header("location:../dashboard.php?pages=buku");
            };     
        };
            
        }
        public function proses_hapus_buku($id){
            $this->koneksi->query("DELETE from buku where buku_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data buku berhasil dihapus';   
            header("location:../dashboard.php?pages=buku");
        }
        public function proses_tampil_buku($buku_id){
            $query = $this->koneksi->query("SELECT * FROM buku where buku_id='$buku_id'");
            return $query->fetch_object();
        }
        public function proses_ubah_buku($judul,$deskripsi,$penulis,$penerbit,$gambar,$buku_id){
            if ($gambar == null) {
                $this->koneksi->query("UPDATE buku set judul_buku='$judul',deskripsi='$deskripsi', penulis='$penulis' ,penerbit='$penerbit' WHERE buku_id='$buku_id'");
                session_start();
                $_SESSION['success'] = 'Data buku berhasil diubah';
                header("location:../dashboard.php?pages=buku");
            }else {
                move_uploaded_file($_FILES['gambar']['tmp_name'],'../assets/img/gambar/' . $gambar);
                $this->koneksi->query("UPDATE buku set judul_buku='$judul',deskripsi='$deskripsi', penulis='$penulis' ,penerbit='$penerbit', gambar='$gambar' WHERE buku_id='$buku_id'");
                session_start();
                $_SESSION['success'] = 'Data buku berhasil diubah';
                header("location:../dashboard.php?pages=buku");
            }      
        }
        // Peminjaman
        public function proses_pencarian_nama($nisn){
                header("location:../dashboard.php?pages=peminjaman&&nisn=$nisn");
        }
        public function proses_pencarian($nisn){
            $query = $this->koneksi->query("SELECT * FROM siswa where nisn='$nisn'");
            return $query->fetch_object();
        }
        public function list_peminjaman(){
            $query = $this->koneksi->query("SELECT * FROM peminjaman INNER JOIN buku ON buku.buku_id = peminjaman.buku_id INNER JOIN siswa ON siswa.nisn = peminjaman.nisn");
            while($list = $query->fetch_object()){
                $hasil[] = $list;
            }
            return $hasil;
        }
        public function proses_simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali){
            $query = $this->koneksi->query("INSERT INTO peminjaman VALUES ('$no_peminjaman','$buku','$siswa','$tgl_pinjam','$tgl_kembali')");
        if ($query) {
            session_start();
            $_SESSION['success'] = 'Data peminjaman berhasil disimpan';
            header("location:../dashboard.php?pages=peminjaman");
        }
        }
        public function list_data_peminjaman(){
            $nisn = $_SESSION['nis'];
            $query = $this->koneksi->query("SELECT * FROM peminjaman INNER JOIN buku ON buku.buku_id = peminjaman.buku_id WHERE nisn=$nisn");
            while($list = $query->fetch_object()){
                $hasil[] = $list;
            }
            return $hasil;
        }
        public function menghitung_buku(){
            $query = $this->koneksi->query("SELECT * FROM buku");
            return $query->num_rows;
        }
        public function menghitung_peminjaman(){
            $query = $this->koneksi->query("SELECT * FROM peminjaman");
            return $query->num_rows;
        }
    }   
    $data = new database();
?>