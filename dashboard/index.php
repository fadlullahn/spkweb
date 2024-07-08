<?php
date_default_timezone_set("Asia/Jakarta");
// Aktifkan Session
session_start();
require "../config/koneksi.php";
$userlogin = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAW & ARAS</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    if ($_SESSION['status'] != "y") {
        header("Location:login.php");
    }
    ?>

    <?php
    require_once '../components/sidebarAdmin.php';
    ?>

    <div class="lg:pl-72">

        <?php
        require_once '../components/navbarAdmin.php';
        ?>

        <main>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="container" style="margin-bottom:100px;margin-top:40px">
                    <?php
                    // Pengaturan MENU
                    $page = isset($_GET['page']) ? $_GET['page'] : "";
                    $action = isset($_GET['action']) ? $_GET['action'] : "";

                    // ADMIN
                    if ($page == "") {
                        include "dashboard.php";
                    } elseif ($page == "users") {
                        if ($action == "") {
                            include "usersData.php";
                        } elseif ($action == "tambah") {
                            include "usersTambah.php";
                        } elseif ($action == "update") {
                            include "usersUbah.php";
                        } else {
                            include "usersHapus.php";
                        }
                    } elseif ($page == "artikel") {
                        if ($action == "") {
                            include "artikelData.php";
                        } elseif ($action == "tambah") {
                            include "artikelTambah.php";
                        } elseif ($action == "update") {
                            include "artikelUbah.php";
                        } else {
                            include "artikelHapus.php";
                        }
                    }
                    // END ADMIN
                    else {
                        if ($action == "") {
                            include "logout.php";
                        }
                    }
                    ?>
                </div>
            </div>

            <?php
            require_once '../components/footer.php';
            ?>

        </main>
    </div>
    <script src="../js//itemActive.js"></script>
</body>

</html>