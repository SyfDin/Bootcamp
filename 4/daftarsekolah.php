<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                Bootstrap
            </a>
            <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myAdd">Add School</button>

            <div class="modal fade" id="myAdd" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Sekolah</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form role="form" action="add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" name="pname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Level Sekolah</label>
                                    <input type="text" name="plevel" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto">
                                </div>
                                <div class="form-group">
                                    <label>NPSN</label>
                                    <input type="text" name="npsn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="padd" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status Sekolah</label>
                                    <input type="text" name="pstatus" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add</button>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <div>
            <h1>welcome</h1>
            <?php
            $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$_SESSION[username]'");
            $peg    = mysqli_fetch_array($tampilPeg);
            ?>
            <h2><?= $peg['name'] ?></h2>
        </div>

        <div class="card-deck">
            <?php
            $sql = "SELECT * FROM school_tb join users on users.id = school_tb.user_id ORDER BY school_tb.status_school DESC";
            $query = mysqli_query($koneksi, $sql);

            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="card">

                    <img class="card-img-top" src="file/<?php echo $data['logo_school']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['name_school']; ?></h5>
                        <p class="card-text"><?php echo $data['school_level']; ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-success" style="text-align: center;">
                        <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $data['sid']; ?>">Detail</a>

                    </div>

                    <div class="modal fade" id="myModal<?php echo $data['sid']; ?>" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Detail Sekolah</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="./models/edit.php" method="get">
                                        <?php
                                        $id = $data['sid'];
                                        $query_edit = mysqli_query($koneksi, "SELECT * FROM school_tb join users on users.id = school_tb.user_id WHERE sid='$id'");
                                        while ($row = mysqli_fetch_array($query_edit)) {
                                        ?>
                                            <input type="hidden" name="pid" value="<?php echo $row['sid']; ?>">
                                            <div class="form-group">
                                                <label>NPSN</label>
                                                <input type="text" name="pname" class="form-control" value="<?php echo $row['NPSN']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="pcode" class="form-control" value="<?php echo $row['address']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Status Sekolah</label>
                                                <input type="text" name="pprice" class="form-control" value="<?php echo $row['status_school']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>User</label>
                                                <input type="text" name="pstok" class="form-control" value="<?php echo $row['name']; ?>">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>