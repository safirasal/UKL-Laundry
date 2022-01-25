<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include("../home.php"); ?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">Form Member</h4>
            </div>

            <div class="card-body">
            <?php
                if (isset($_GET["id_member"])) {
                    include("../connection.php");
                    $id_member = $_GET["id_member"];
                    $sql = "select * from member where id_member='$id_member'";

                    //eksekusi perintah sql
                    $ubah = mysqli_query($connect, $sql);

                    // konversi hasil query ke bentuk array
                    $member = mysqli_fetch_array($ubah);
                ?>

                    <form action="process-member.php" method="post"
                    onsubmit="return confirm('Are you edit this people?')">
                    
                        ID Member
                        <input type="text" name="id_member"
                        class="form-control mb-2" required
                        value="<?=$member["id_member"];?>" readonly>

                        Nama Member
                        <input type="text" name="nama_member"
                        class="form-control mb-2" required
                        value="<?=$member["nama_member"];?>">

                        Alamat
                        <input type="text" name="alamat_member"
                        class="form-control mb-2" required
                        value="<?=$member["alamat_member"];?>">

                        Jenis Kelamin
                            <select name="jenis_kelamin" class="form-control mb-2" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

                        Telepon
                        <input type="text" name="tlp"
                        class="form-control mb-2" required
                        value="<?=$member["tlp"];?>">

                        <button type="submit" class="btn btn-success btn-block"
                        name="edit_member">
                            Simpan
                        </button>
                    </form>
                <?php
                }else{
                    //jika false, menggunakan ini untuk insert
                ?>
                    <form action="process-member.php" method="post">

                        ID Member
                        <input type="text" name="id_member"
                        class="form-control mb-2" required>

                        Nama Member
                        <input type="text" name="nama_member"
                        class="form-control mb-2" required>

                        Alamat
                        <input type="text" name="alamat_member"
                        class="form-control mb-2" required>

                        Jenis Kelamin
                            <select name="jenis_kelamin" class="form-control mb-2" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

                        Telepon
                        <input type="text" name="tlp"
                        class="form-control mb-2" required>

                        <button type="submit" class="btn btn-success btn-block"
                        name="simpan_member">
                            Simpan
                        </button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>