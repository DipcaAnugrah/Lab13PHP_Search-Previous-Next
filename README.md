# **Lab13PHP Search Previous Next**
```
Nama    : Dipca Anugrah
NIM     : 312210666
Kelas   : TI.22.A.4
Matkul  : Pemrograman Web 1
```
## **Membuat Pencarian Data**
Untuk membuat pencarian data, yang perlu di perhatikan adalah penggunaan filter pada query data.
Pada data awal, query untuk menampilkan semua data adalah: 
```sql
$sql = “SELECT * FROM data_barang”;
```
Nah untuk menambahkan pencarian, maka query tersebut harus ditambahkan klausa WHERE sebagai 
filter, sehingga menjadi:
```sql
$sql = “SELECT * FROM data_barang WHERE nama = ‘{$var_nama}’”;
```
Atau dapat juga menggunakan LIKE seperti berikut:
```sql
$sql = “SELECT * FROM data_barang WHERE nama LIKE ‘{$var_nama}%’”;
```
Langkah selanjutnya adalah membuat form pencarian.
```html
 <form action="" method="get">
                <label for="q">Cari data:</label>
                <input type="text" id="q" name="q" class="input-q input"
                    value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
                <input type="submit" name="submit" value="Cari" class="btn btn-primary" id="">
            </form>
```
Sisipkan kode tersebut pada file index.php (daftar barang), sebelum table data dan sesudah tombol 
tambah data.
Lalu rubah querynya dan tambahkan filter pencarian pada query tersebut.
```php
$q = $db->escapeString(isset($_GET['q']) ? $_GET['q'] : '');
$sql = "SELECT * FROM data_barang WHERE nama LIKE '%$q%' OR kategori LIKE '%$q%'";

$result = $db->query($sql);
```
## **Membuat Pagination**
Pagination digunakan untuk membatasi atau membagi record data yang akan ditampilkan pada 
laman web. Dari seluruh record data yang ada akan dibagi berdasarkan jumlah record 
per-halaman.
Pada prinsipnya untuk membatasi tampilan record data pada query mysql menggunakan LIMIT 
dan OFFSET;
Query alwal:
```sql
$sql = “SELECT * FROM tabel_barang”;
```
Untuk menapilkan data dari record ke 1 sampai record ke 10:
```sql
$sql = “SELECT * FROM table_barang LIMIT 10”;
```
Untuk menampilkan data dari receord ke 11 sampai dengan record ke 20, disini digunakan 
OFFSET:
```sql
$sql = “SELECT * FROM table_barang LIMIT 10,20”;
```
Untuk membagi jumlah halaman, tentu kita harus ketahui dulu jumlam record secara keseluruhan, 
selanjutnya di bagi dengan jumlah record per halaman, maka akan diketahui jumlah halamannya.
Untuk mengetahui jumlah record secara keseluruhan:
```sql
$sql = “SELECT COUNT(*) FROM table_barang”;
```
Misal resultnya adalah 30 record, akan ditampilkan perhalaman sejumlah 10 record, maka:
```sql
$page = $row_count / $per_page; ==> 3 = 30/10 
```
Maka akan dihasilkan 3 halaman, sehingga paging dibuat menjadi tiga tombol (1, 2, 3).
**File: index.php**
Lakukan perubahan code mulai baris 10:
```php
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
```
selanjutnya tambahkan code berikut setelah tabel data:
```php
<ul class="pagination">
            <?php
            $prev_page = $page - 1;
            $next_page = $page + 1;
            ?>

            <?php if ($page > 1): ?>
                <li><a href="?page=<?= $prev_page . ($q ? "&q=$q" : ''); ?>">&laquo;</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $num_page; $i++): ?>
                <?php $link = "?page=$i" . ($q ? "&q=$q" : ''); ?>
                <li><a class="<?= ($page == $i ? 'active' : ''); ?>" href="<?= $link; ?>">
                        <?= $i; ?>
                    </a></li>
            <?php endfor; ?>

            <?php if ($page < $num_page): ?>
                <li><a href="?page=<?= $next_page . ($q ? "&q=$q" : ''); ?>">&raquo;</a></li>
            <?php endif; ?>
        </ul>

```
## **Result**

https://github.com/dipca0895/Lab13PHP_Search-Previous-Next/assets/115719283/b61b17b9-67d8-44e8-9e98-186b13108630

