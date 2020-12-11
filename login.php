<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
}
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username  = $_POST['Username'];
    $password  = $_POST['Password'];
    // $p         = hash('sha1', $password);

    if ($username == "" || $password == "") {
        $error = true;
    } else {
        $data   = mysqli_query($konek, "SELECT * FROM user WHERE Username ='" . $username . "' AND Password = '" . $password . "'");
        $dt     = mysqli_num_rows($data);
        $dta    = mysqli_fetch_assoc($data);
        $st     = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_User='$dta[ID_User]'");
        $sta    = mysqli_fetch_assoc($st);

        if ($sta['Status_Aktif'] == 'Non Aktif') {
            $status = true;
        } else if ($dt > 0) {
            // session_start();
            $_SESSION['login']    = true;
            $_SESSION['Username'] = $dta['Username'];
            $_SESSION['id']       = $dta['ID_User'];

            // cek jika user index sebagai Petugas
            if ($dta['Level'] == "Petugas") {
                // buat session index dan Username
                $_SESSION['login']          =    true;
                $_SESSION['ID_User']        =    $dta['ID_User'];
                $_SESSION['Username']       =    $dta['Username'];
                $_SESSION['Level']          =    "Petugas";
                $_SESSION['Password']       =    $dta['Password'];
                $_SESSION['Nama_Lengkap']   =    $dta['Nama_Lengkap'];
                $_SESSION['Email']          =    $dta['Email'];

                echo "
                <script>
                document.location.href = 'index.php';
                </script>
                ";

                // cek jika user index sebagai Anggota
            } else if ($dta['Level'] == "Anggota") {


                // buat session index dan Username
                $_SESSION['login']          =     true;
                $_SESSION['ID_User']        =    $dta['ID_User'];
                $_SESSION['Username']       =    $dta['Username'];
                $_SESSION['Level']          =    "Anggota";
                $_SESSION['Password']       =    $dta['Password'];
                $_SESSION['Nama_Lengkap']   =    $dta['Nama_Lengkap'];
                $_SESSION['Email']          =    $dta['Email'];
                echo "
                <script>
                document.location.href = 'index_anggota.php';
                </script>
                ";

            } else {
                echo "
                <script>
                document.location.href = 'login.php';
                </script>
                ";
                exit; //selesai
            }
        } else {
            $error = true;
        }
    }
}

?>





<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login KSP Cibinong</title>
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
        #mybutton {
            position: relative;
            z-index: 1;
            left: 92%;
            top: -27px;
            cursor: pointer;
        }

        .myinput {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>

<body>


    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-9 col-lg-6 col-md-5 my-auto p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('img/auth/4041086.jpg');background-size:100%;
                    background-repeat-no-repeat;background-position:center;">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-7 p-0">
                    <div class="authentication-form mx-auto mt-50">
                        <div class="text-center mt-50">
                            <!-- <a href="index.html"><img src="src/img/brand.svg" alt=""></a> -->
                            <h4 class="text-center font-weight-bold mb-50">- KOPERASI.<a class="text-danger">SP</a> -</h4>
                        </div>
                        <p class="text-left">Selamat Datang di Koperasi ..</p>
                        <!-- <p>Happy to see you again!</p> -->
                        <form class="form" method="post" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Username" placeholder="Username" required="">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input class="myinput form-control" type="password" name="Password" placeholder="Password" id="password" required="">
                                <span id="mybutton" onclick="change()"><i class="ik ik-eye-off" aria-hidden="true"></i></span>
                                <i class="ik ik-lock"></i>
                            </div>
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong class="text-red">Username / Password salah</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ik ik-x"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($status)) : ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong class="text-red" style="font-size: 14px">Akun Telah di Non Aktifkan !</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ik ik-x"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="form-group text-right">
                                <a href="forgot_password.php">Lupa Password ?</a>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme btn-lg" name="login">Login</button>
                            </div>
                        </form>
                        <!-- <div class="register">
                            <p>Belum punya akun ? <a href="register.php"><b>Buat Akun Sekarang</b></a></p>
                        </div> -->
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
    </script>
</body>

</html>