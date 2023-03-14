<h1>Form Tambah User</h1>

<hr>
<form action="routes/proses.php" method="post">
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="simpan_user" value="Simpan">
        <a href="dashboard.php?pages=users" class="btn btn-danger">Kembali</a>
    </div>
</form>
