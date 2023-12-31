<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <div class="container">
    <?php 
            require('../../template/header.php'); 
        ?>
        <h2>Home</h2>
        <div class="row">
            <div class="modular">
                <p>Modularisasi dalam konteks pengembangan perangkat lunak, termasuk dalam bahasa pemrograman
                    seperti PHP, merujuk pada praktik membagi program menjadi modul atau bagian-bagian yang lebih
                    kecil dan terpisah. Tujuan dari modularisasi adalah untuk meningkatkan keterbacaan,
                    pemeliharaan, dan keberlanjutan kode.</p>

                <p>Dalam PHP, modularisasi dapat diimplementasikan dengan berbagai cara, antara lain:</p>
                <ol class="modular-list">
                    <li>
                        <h3>
                            <h3>Fungsi</h3>
                        </h3>
                        <p>
                            Membuat fungsi-fungsi terpisah untuk tugas-tugas tertentu. Fungsi-fungsi ini dapat
                            dipanggil dari berbagai bagian kode PHP, sehingga mengurangi duplikasi kode dan
                            meningkatkan keterbacaan. <br> Contoh:</p>
                        <pre>
                                <code>
// Di file util.php
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;

// Di file main.php
include 'util.php';
$luas = hitungLuasPersegiPanjang(5, 10);

                                </code>
                            </pre>
                    </li>
                    <li>
                        <h3>Kelas dan Objek</h3>
                        <p>
                            Menggunakan konsep pemrograman berorientasi objek (OOP) dengan membuat kelas dan objek.
                            Setiap kelas dapat berisi fungsionalitas terkait yang terkonsentrasi, dan objek dapat
                            diinstansiasi untuk digunakan dalam kode lain. <br>

                            Contoh:
                        </p>
                        <pre>
                                <code class="language-php">
// Di file Produk.php
class Produk {
    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function tampilkanInfo() {
        echo "Nama: " . $this->nama . ", Harga: " . $this->harga;
    }
}

// Di file main.php
include 'Produk.php';
$barang = new Produk("Laptop", 5000000);
$barang->tampilkanInfo();

                                </code>
                            </pre>
                    </li>
                    <li>
                        <h3>Namespace</h3>
                        <p>Menggunakan namespace untuk mengelompokkan kode ke dalam ruang nama tertentu. Ini membantu
                            menghindari konflik nama antar kelas, fungsi, atau konstanta. <br>

                            Contoh:</p>
                        <pre>
                                <code>
// Di file namespace.php
namespace Util;

function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

// Di file main.php
include 'namespace.php';
$luas = Util\hitungLuasPersegiPanjang(5, 10);

                                </code>
                            </pre>
                    </li>
                </ol>

            </div>
        </div>
        <?php require('../../template/footer.php'); ?>
    </div>
</body>

</html>