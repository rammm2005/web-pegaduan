<?php
include '../koneksi.php';

$statuses = ['tolak', 'belum proses', 'proses', 'selesai'];
$countsByStatus = [];

foreach ($statuses as $status) {
    $count_query = mysqli_query($koneksi, "SELECT COUNT(*) as count, DATE(tgl_pengaduan) as date FROM viewpengaduan WHERE status='$status' GROUP BY DATE(tgl_pengaduan) ORDER BY DATE(tgl_pengaduan)");
    $counts = [];

    while ($row = mysqli_fetch_assoc($count_query)) {
        $counts[] = $row['count'];
    }

    $countsByStatus[$status] = $counts;
}

echo json_encode($countsByStatus);
?>
