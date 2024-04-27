<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Deskripsi.php');
include('classes/Harga.php');
include('classes/Nama.php');
include('classes/Stock.php');
include('classes/Template.php');

// buat instance pengurus
$listtoko = new Deskripsi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listtoko->open();
// tampilkan data pengurus
$listtoko->getDeskripsiJoin();

// cari pengurus
if (isset($_POST['btn-cari'])) {
    // methode mencari data pengurus
    $listtoko->searchDeskripsi($_POST['cari']);
} else {
    // method menampilkan data pengurus
    $listtoko->getDeskripsi();
}

$data = null;

// ambil data pengurus
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listtoko->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 pengurus-thumbnail">
        <a href="detail.php?id=' . $row['id_deskripsi'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['gambar'] . '" class="card-img-top" alt="' . $row['gambar'] . '">
            </div>
            <div class="card-body">
            <p class="card-text jabatan-nama my-0">' . $row['nama_barang'] . '</p>
                <p class="card-text jabatan-nama my-0">' . $row['deskripsi_barang'] . '</p>
                <p class="card-text jabatan-nama my-0">Rp. ' . $row['harga_barang'] . '</p>
                <p class="card-text jabatan-nama my-0">' . $row['stock_barang'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listtoko->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_UTAMA', $data);
$home->write();
