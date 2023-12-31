<?php

session_start();

$title = 'Data Barang';
include_once '../class/database.php';

// Inisialisasi objek Database
$db = new Database('host', 'username', 'password', 'db_name');
$conn = $db->getConn(); // Menggunakan metode getConn untuk mendapatkan koneksi

if (isset($_POST['submit'])) {

    $user = $db->escapeString($_POST['username']);
    $password = $db->escapeString($_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '{$user}' AND password = md5('{$password}')";

    $result = $db->query($sql);
    if ($result && $result->num_rows != 0) {
        $_SESSION['isLogin'] = true;
        $_SESSION['username'] = $result->fetch_array();

        header('location: artikel/index.php');
        exit();
    } else {
        $errorMsg = "<p style=\"color:red;\">Gagal Login, silakan ulangi lagi. Error: " . $db->getConn()->error . "</p>";
    }
}

if (isset($errorMsg)) {
    echo $errorMsg;
}

// Menutup koneksi database
$db->closeConnection();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            width: 40%;
        }
        .input {
            padding: 10px;
            width: 100%;
        }
        .submit input {
            padding: 7px;
            border-radius: 10px;
            border: white solid 1px;
            background-color: cornflowerblue;
            color: whitesmoke;
        }
        .submit input:hover {
            background-color: blue;
        }
    </style>
</head>

<body>
    <div class="container">

        <h2>Login</h2>
        <form method="post">
            <div class="input">
                <label>Username</label>
                <input type="text" name="username" />
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password" />
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Login" />
            </div>
        </form>
    </div>
</body>

</html>
