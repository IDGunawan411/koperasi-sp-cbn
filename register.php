<?php
include "koneksi.php";
// membuat nomor d Registrasi sesuai tanggal
//membuat ID Anggota
$text           = "L20";
$query          = mysqli_query($konek, "SELECT max(ID_Anggota) AS last FROM anggota WHERE ID_Anggota LIKE '$text%'");
$data           = mysqli_fetch_array($query);
$lastNoAnggota  = $data['last'];
$lastNoUrut     = substr($lastNoAnggota, 3,  4);
$nextNoUrut      = $lastNoUrut + 1;
$nextNoID       = $text . sprintf('%04s', $nextNoUrut);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign Up | Koperasii</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        #mybutton,
        #mybutton2 {
            position: relative;
            z-index: 1;
            left: 92%;
            top: -25px;
            cursor: pointer;
        }

        .myinput,
        .myinput2 {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('img/auth/register-bg.jpg')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered mb-3">
                            <a href="index.html"><img src="src/img/brand.svg" alt=""></a>
                        </div>
                        <form action="" method="post">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                // post anggota
                                $idAdmin          = $_POST['ID_Admin'];
                                $username         = $_POST['Username'];
                                $password          = $_POST['Password'];
                                $nama             = $_POST['Nama_Lengkap'];
                                $jabatan          = $_POST['Jabatan'];
                                $email            = $_POST['Email'];
                                $level            = $_POST['Level'];


                                //simpan data user
                                mysqli_query($konek, "INSERT INTO `user` (`ID_User`, `Username`, `Password`, `Nama_Lengkap`, `Jabatan`, `Email`,`Level`) 
                                    VALUES ('$idAdmin', '$username', '$password', '$nama', '$jabatan', '$email', '$level')");

                                echo "<script>document.location.href = 'login.php';</script>";
                            }
                            ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ID_Admin" value="<?= $nextNoID; ?>" required readonly>
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="Username" placeholder="Nama Lengkap" required>
                                <i class="ik ik-user"></i>
                            </div>

                            <div class="form-group">
                                <input class="myinput form-control" type="password" name="Password" placeholder="Password" id="password" required>
                                <!-- <span id="mybutton" onclick="change()"><i class="ik ik-eye-off" aria-hidden="true"></i></span> -->
                                <i class="ik ik-lock"></i>
                            </div>
                            <div class="form-group">
                                <input class="myinput2 form-control" type="password" name="Password2" placeholder="Konfirmasi Password" id="password2" required>
                                <!-- <span id="mybutton2" onclick="change2()"><i class="ik ik-eye-off" aria-hidden="true"></i></span> -->
                                <i class="ik ik-lock"></i>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="Jabatan" placeholder="Jabatan" required>
                                <i class="ik ik-user"></i>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="Email" placeholder="Email" required>
                                <i class="ik ik-mail"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="Level" value="Petugas" required readonly>
                                <i class="ik ik-users"></i>
                            </div>
                            <div class="sign-btn text-center">
                                <button type="submit" class="btn btn-theme" name="register">Create Account</button>
                            </div>
                        </form>
                        <div class="register">
                            <p>Already have an account? <a href="login.php"><strong> Sign In</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="plugins/screenfull/dist/screenfull.js"></script>
    <script src="dist/js/theme.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');

        function change() {
            var x = document.getElementById('password').type;

            if (x == 'password') {
                document.getElementById('password').type = 'text';
                document.getElementById('mybutton').innerHTML = '<i class="ik ik-eye" aria-hidden="true"></i>';
            } else {
                document.getElementById('password').type = 'password';
                document.getElementById('mybutton').innerHTML = '<i class="ik ik-eye-off" aria-hidden="true"></i>';
            }
        }

        function change2() {
            var x = document.getElementById('password2').type;

            if (x == 'password') {
                document.getElementById('password2').type = 'text';
                document.getElementById('mybutton2').innerHTML = '<i class="ik ik-eye" aria-hidden="true"></i>';
            } else {
                document.getElementById('password2').type = 'password';
                document.getElementById('mybutton2').innerHTML = '<i class="ik ik-eye-off" aria-hidden="true"></i>';
            }
        }
    </script>
</body>

</html>