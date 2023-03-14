<h1>Ubah User</h1>
<?php
        $u = $data->Tampil_data($_GET['pages'],'user_id',$_GET['id']);
?>
<hr>
<form action="routes/proses.php" method="post">
        <input type="hidden" value="<?=$_GET['id']?>" name="id">
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value=<?=$u->username?>>
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="ubah_user" value="Simpan">
        <a href="dashboard.php?pages=users" class="btn btn-danger">Kembali</a>
    </div>
</form>
