<?php
include './config/koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK WEB</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .hidden1 {
            display: none;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <?php
    require_once 'components/navbar.php';
    ?>

    <header id="header" class="lg:px-[110px] lg:mt-28">
        <div class="bg-blue-400 text-white font-bold text-2xl text-end">
            <div class="p-2">
                Kumpulan Sistem Penunjang Keputusan
            </div>
        </div>
        <div class="text-start">
            <div class="py-2 font-extrabold text-5xl text-green-400">
                Kumpulan Sistem Penunjang Keputusan
            </div>
            <div class="text-xl">
                <b>Sistem Pendukung Keputusan</b> (SPK) adalah bagian dari sistem informasi berbasis komputer (termasuk sistem berbasis pengetahuan - manajemen pengetahuan) yang dipakai untuk mendukung pengambilan keputusan dalam suatu organisasi atau perusahaan.
            </div>
        </div>
        <div class="bg-blue-200 my-3 rounded-md">
            <div class="p-3 text-xl">
                Author : <span class="font-semibold text-green-300 bg-slate-500 rounded-md p-1">Fadlullah</span> | Published on : <span class="font-semibold text-green-300 bg-slate-500 rounded-md p-1">08 Maret 2024</span> | Updated on : <span class="font-semibold text-green-300 bg-slate-500 rounded-md p-1">02 Juli 2024</span>
            </div>
        </div>
    </header>

    <main class="flex flex-1 lg:px-[110px]">
        <div class="w-3/4 mt-10 pr-12">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : "";

            if ($page == "") {
                include "home.php";
            } elseif ($page == "") {
                include "";
            }
            ?>
        </div>
        <div class="w-1/3 mt-10">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : "";

            if ($page == "") {
                include "./components/sidebarHome.php";
            } elseif ($page == "") {
                include "";
            }
            ?>
        </div>
    </main>

    <?php
    require_once 'components/footer.php';
    ?>

    <script src="./js/navbar.js"></script>
    <script src="./js//itemActive.js"></script>

</body>

</html>