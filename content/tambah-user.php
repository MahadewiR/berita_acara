<?php
if (isset($_POST['simpan'])) {
    $id = (isset($_GET['edit'])) ? $_GET['edit'] : '';
    $level_name = $_POST['level_name'];
    $insert = mysqli_query($koneksi, "INSERT INTO users (fullname, email, password) VALUES ('$fullnmae', '$email', '$password')");

    // if (!$id) {
    //     $insert = mysqli_query($koneksi, "INSERT INTO users (user_name) VALUES ('$user_name')");
    // } else {
    //     $update = mysqli_query($koneksi, "UPDATE users SET user_name='$user_name' WHERE id = '$id'");
    // }

    header("location:?pg=user&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
    header("Location:?pg=user&hapus=berhasil");
}

//$id = $_GET['edit'] ?? '';
//isset : tidak kosong / ada isinya
//empty : kosong

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $id = $_GET['edit'];
    $update = mysqli_query($koneksi, "UPDATE users SET fullname= '$fullname',  email = '$email', password = '$password' WHERE id = '$id'");
    header("Location:?pg=user&edit=berhasil");
}

?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <table for="">Nama Lengkap</table>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required value="<?= $rowEdit['fullname'] ?? '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <table for="">Email</table>
        </div>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" placeholder="Email" required value="<?= $rowEdit['email'] ?? '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <table for="">Password</table>
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="password" placeholder="Password" required value="<?= $rowEdit['password'] ?? '' ?>">
        </div>
    </div>
    <div class="mb-3 offset-md-2">
        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
            <?= isset($_GET['edit']) ? 'ubah' : 'simpan' ?>
        </button>
        <a href="?pg=user" class="btn btn-secondary">Kembali</a>
    </div>
</form>