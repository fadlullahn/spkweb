<?php
include './config/koneksi.php';

$query = $_SERVER['QUERY_STRING'];

if (empty($query)) {
    die("Error (01)");
}

$stmt = $conn->prepare("SELECT * FROM artikel WHERE idjudul = ?");
if (!$stmt) {
    die("Error (02)" . $conn->error);
}
$stmt->bind_param("s", $query);
$stmt->execute();
$result = $stmt->get_result();

$artikel = null;
if ($result->num_rows > 0) {
    $artikel = $result->fetch_assoc();
} else {
    echo "Error (03)";
}

$stmt->close();
$conn->close();

function ignoreCodeTags($code)
{
    return htmlspecialchars($code[1]);
}

$konten = preg_replace_callback(
    '/<code>(.*?)<\/code>/s',
    'ignoreCodeTags',
    $artikel['konten']
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $artikel['judul']; ?></title>
    <link rel="stylesheet" href="style.css">

    <style>
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

    <header class="lg:px-[110px] lg:mt-28">
        <div class="bg-blue-400 text-white font-bold text-2xl text-end">
            <div class="p-2">
                Kumpulan Sistem Penunjang Keputusan
            </div>
        </div>
        <div class="text-start">
            <div class="py-2 font-extrabold text-5xl text-green-400">
                <?php echo $artikel['subjudul']; ?>
            </div>
            <div class="py-2 font-bold text-3xl">
                <?php echo $artikel['deskripsi']; ?>
            </div>
            <div class="text-xl">
                <?php echo $artikel['subdeskripsi']; ?>
            </div>
        </div>
        <div class="bg-blue-200 my-3 rounded-md">
            <div class="p-3 text-xl">
                Author : <span class="font-semibold text-green-300 bg-slate-500 rounded-md p-1">Fadlullah</span> | Published on : <span class="font-semibold text-green-300 bg-slate-500 rounded-md p-1">08 Maret 2024</span> | Updated on : <span class="font-semibold text-green-300 bg-slate-500 rounded-md p-1">02 Juli 2024</span>
            </div>
        </div>
    </header>

    <main class="flex flex-1 lg:px-[110px]">
        <div id="articleContent" class="w-3/4 mt-10 pr-12">
            <?php echo $konten; ?>
        </div>
        <div class="w-1/3 mt-10">
            <div class="bg-blue-200 rounded-lg p-3 text-base">
                <ul>
                    <li>
                        Pendahuluan
                    </li>
                    <li>
                        Contoh Kasus dan Perhitungan
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <?php
    require_once 'components/footer.php';
    ?>

    <script src="./js/navbar.js"></script>
</body>

</html>