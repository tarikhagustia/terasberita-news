<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal = '2016-10-02 12:17:00';

echo date_indonesia($tanggal);


function date_indonesia($date, $pukul = false)
    {
        $hariData      = array('minggu','senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu');
        $BulanIndo = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");
        
        // var_dump($date_creatae);
        $hari = date('w', strtotime($date));
        // var_dump($hari);
        $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
        $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
        $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
        $jam  = date('H:i', strtotime($date));
        $result = ucfirst($hariData[$hari]) . ", " .$tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun . " pada " .$jam . " WIB";
        
        return $result;
    }
?>