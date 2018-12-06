<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="../css/bootstrap.min.css" />
    <link rel="stylesheet" a href="../css/all.min.css" />
    <link rel="stylesheet" a href="../css/magnific-popup.css" />
    <link rel="stylesheet" a href="../css/creative.min.css" />
    <link rel="stylesheet" a href="../css/style.css" />
    <title>KRIPTOGRAPH</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php?page=home">KRIPTOGRAPH</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" data-toggle="dropdown"> Rot13 </a>
                        <div class="dropdown-menu ">
                            <a href="index.php?page=13manual" class="dropdown-item "> Manual </a>
                            <a href="index.php?page=13upload" class="dropdown-item "> Upload </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" data-toggle="dropdown"> Caesar </a>
                        <div class="dropdown-menu ">
                            <a href="index.php?page=cemanual" class="dropdown-item "> Manual </a>
                            <a href="index.php?page=cupload" class="dropdown-item "> Upload </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" data-toggle="dropdown"> Vigeneer </a>
                        <div class="dropdown-menu ">
                            <a href="index.php?page=vemanual" class="dropdown-item "> Manual </a>
                            <a href="index.php?page=vupload" class="dropdown-item "> Upload </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" data-toggle="dropdown"> Download </a>
                        <div class="dropdown-menu ">
                            <a href="index.php?page=rot13" class="dropdown-item "> Rot13 </a>
                            <a href="index.php?page=caesar" class="dropdown-item "> Caesar </a>
                            <a href="index.php?page=veginer" class="dropdown-item "> Vigeneer </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-area">
    <?php 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            //Awal
            case 'home':
                include "home/home.php";
                break;

            //Rot13 Manual
            case '13manual':
                include "rot13/manual.php";
                break;

            //Rot13 Upload
            case '13upload':
                include "rot13/upload.php";
                break;

            //Caesar Manual
            case 'cemanual':
                include "caesar/manual.php";
                break;

            //Caesar Upload
            case 'cupload':
                include "caesar/upload.php";
                break;

            //veginer Manual
            case 'vupload':
                include "veginer/upload.php";
                break;

            //veginer Upload
            case 'vemanual':
                include "download/manual.php";
                break;

            //veginer Download
            case 'veginer':
                include "download/veginer.php";
                break;

            //caesar Download
            case 'caesar':
                include "download/caesar.php";
                break;

            //veginer Download
            case 'rot13':
                include "download/rot.php";
                break;


            //Not Load
            default:
                header('location:404/404.html');
                break;
        }
    } else {
        // Default
        include "home/home.php";
    }
    ?>

    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/creative.min.js"></script>
</body>

</html>