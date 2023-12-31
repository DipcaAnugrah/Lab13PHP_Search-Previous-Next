<?php

class FormLibrary
{
    public static function generateTable($result)
    {
        $tableHTML = '<table class="data-table">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tableHTML .= '<tr>
                                <td><img src="../../gambar/' . $row['gambar'] . '" alt="' . $row['nama'] . '"></td>
                                <td>' . $row['nama'] . '</td>
                                <td>' . $row['kategori'] . '</td>
                                <td>' . $row['harga_beli'] . '</td>
                                <td>' . $row['harga_jual'] . '</td>
                                <td>' . $row['stok'] . '</td>
                                <td class="aksi">
                                    <a class="ubah" href="ubah.php?id=' . $row['id_barang'] . '">Ubah</a>
                                    <a class="hapus" href="hapus.php?id=' . $row['id_barang'] . '">Hapus</a>
                                </td>
                            </tr>';
            }
        } else {
            $tableHTML .= '<tr>
                            <td colspan="7">Belum ada data</td>
                        </tr>';
        }
        

        $tableHTML .= '</table>';
        return $tableHTML;
    }

    public static function generateUbah($currentValue, $options)
    {
        $html = '';
        foreach ($options as $value => $label) {
            $selected = ($value == $currentValue) ? 'selected="selected"' : '';
            $html .= "<option value=\"$value\" $selected>$label</option>";
        }
        return $html;
    }
}
?>
