<?php
include("../../class/database.php");
include("../../class/formlibary.php");

$config = include("../../class/config.php");

$db = new Database($config['host'], $config['username'], $config['password'], $config['db_name']);

$q = $db->escapeString(isset($_GET['q']) ? $_GET['q'] : '');
$sql = "SELECT * FROM data_barang WHERE nama LIKE '%$q%' OR kategori LIKE '%$q%'";

$result = $db->query($sql);

$sql_count = "SELECT COUNT(*) FROM data_barang";
if (isset($sql_where)) {
    $sql .= $sql_where;
    $sql_count .= $sql_where;
}

$result_count = $db->query($sql_count);
$count = 0;
if ($result_count) {
    $r_data = $result_count->fetch_row();
    $count = $r_data[0];
}
$per_page = 1;
$num_page = ceil($count / $per_page);
$limit = $per_page;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $offset = ($page - 1) * $per_page;
} else {
    $offset = 0;
    $page = 1;
}
$sql .= " LIMIT $offset, $limit";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <style>
        h2 {
            margin-bottom: 10px;
        }

        form {
            margin-top: 15px;
        }

        input[type="text"] {
            border-radius: 5px;
            border: slategrey 1px solid;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px;
            border: slategrey 1px solid;
            border-radius: 5px;
            background: #1e90ff;
            color: white;

        }

        input[type="submit"]:hover {
            background: #4682b4;
            cursor: pointer;
        }

        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {
            display: inline;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        ul.pagination li a.active {
            background-color: #428bca;
            color: white;
        }

        ul.pagination li a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        require('../../template/header.php');
        ?>
        <h2>Data Barang</h2>
        <div class="main">

            <a class="tambah" href="tambah.php">Tambah Barang</a>
            <form action="" method="get">
                <label for="q">Cari data:</label>
                <input type="text" id="q" name="q" class="input-q input"
                    value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
                <input type="submit" name="submit" value="Cari" class="btn btn-primary" id="">
            </form>

            <?php echo FormLibrary::generateTable($result); ?>
        </div>
        <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <?php for ($i = 1; $i <= $num_page; $i++) {
                $link = "?page={$i}";
                if (!empty($q))
                    $link .= "&q={$q}";
                $class = ($page == $i ? 'active' : '');
                echo "<li><a class=\"{$class}\" href=\"{$link}\">{$i}</a></li>";
            } ?>
            <li><a href="#">&raquo;</a></li>
        </ul>

        <?php require('../../template/footer.php'); ?>
    </div>
</body>

</html>

<?php
// Jangan lupa untuk menutup koneksi setelah selesai menggunakannya
$db->closeConnection();
?>