<?php 
        include 'koneksi.php';
        session_start();
        if (!isset($_SESSION['username'])) {

        }
        
            $pname = $_POST['pname'];
            $plevel = $_POST['plevel'];
            $npsn = $_POST['npsn'];
            $padd = $_POST['padd'];
            $pstatus = $_POST['pstatus'];
            $login   = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$_SESSION[username]'");
            $peg    = mysqli_fetch_array($login);
            $puser = $peg['id'];
		
            $rand = rand();
            $ekstensi =  array('png','jpg','jpeg','gif');
            $filename = $_FILES['foto']['name'];
            $ukuran = $_FILES['foto']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
 

            if(!in_array($ext,$ekstensi) ) {
                header("location:daftarsekolah.php?alert=gagal_ekstensi");
            }else{
                if($ukuran < 1044070){		
                 
                    $xx = $rand.'_'.$filename;
                    move_uploaded_file($_FILES['foto']['tmp_name'], 'file/'.$rand.'_'.$filename);
                    mysqli_query($koneksi,"INSERT INTO school_tb VALUES('', '$npsn', '$puser', '$pname', '$padd', '$xx', '$plevel', '$pstatus')");
                    header("location:daftarsekolah.php?alert=berhasil");
                }else{
                    header("location:daftarsekolah?alert=gagal_ukuran");
                }
            }
		?>