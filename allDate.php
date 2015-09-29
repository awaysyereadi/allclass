<?php

class allDate {

    function dateinfo() {
        $hari = array(
            'Minggu'
            , 'Senin'
            , 'Selasa'
            , 'Rabu'
            , 'Kamis'
            , 'Jumat'
            , 'Sabtu');

        $bulan = array(
            'Januari'
            , 'Februari'
            , 'Maret'
            , 'April'
            , 'Mei'
            , 'Juni'
            , 'Juli'
            , 'Agustus'
            , 'September'
            , 'Oktober'
            , 'November'
            , 'Desember');
        $tanggal = getdate();
        return $hari[$tanggal['wday']] . ", " . $tanggal['mday'] . " " . $bulan[$tanggal['mon']] . " " . $tanggal['year'];
    }

    // format mmm DD yyyy HH:MM:SS 
    // menjadi dd mmmmmm yyyy
    function tgl_indo($tgl) {
        if (substr($tgl, 5, 1) == " ") {
            $tanggal = substr("00" . substr($tgl, 4, 1), -2);
            $tahun = substr($tgl, 6, 4);
        } else {
            $tanggal = substr($tgl, 4, 2);
            $tahun = substr($tgl, 7, 4);
        }
        $bulan = substr($tgl, 0, 3);
        $bln = getBulan($bulan);
        return $tanggal . ' ' . $bln . ' ' . $tahun;
    }

    // format mmm DD yyyy HH:MM:SS 
    // menjadi dd/mm/yyyy
    function tgl_indo2($tgl) {
        if (substr($tgl, 5, 1) == " ") {
            $tanggal = substr("00" . substr($tgl, 4, 1), -2);
            $tahun = substr($tgl, 6, 4);
        } else {
            $tanggal = substr($tgl, 4, 2);
            $tahun = substr($tgl, 7, 4);
        }
        $bulan = substr($tgl, 0, 3);
        $bln = getBulan2($bulan);

        if (strlen(trim($tanggal . '/' . $bln . '/' . $tahun)) < 10) {
            return '0' . trim($tanggal) . '/' . $bln . '/' . $tahun;
        } else {
            return $tanggal . '/' . $bln . '/' . $tahun;
        }
    }
    
    // format dd/mm/yyyy 
    // menjadi yyyymmdd
    function datetossave($tgl) {
        $tanggal = substr($tgl, 0, 2);
        $bulan = substr($tgl, 3, 2);
        $tahun = substr($tgl, 6, 4);
        return $tahun . $bulan . $tanggal;
    }

    // format mmm DD yyyy HH:MM:SS 
    // menjadi yyyy-mm-dd
    function tgl_indo3($tgl) {
        if (substr($tgl, 5, 1) == " ") {
            $tanggal = substr("00" . substr($tgl, 4, 1), -2);
            $tahun = substr($tgl, 6, 4);
        } else {
            $tanggal = substr($tgl, 4, 2);
            $tahun = substr($tgl, 7, 4);
        }
        $bulan = substr($tgl, 0, 3);
        $bln = getBulan2($bulan);

        if (strlen(trim($tanggal . '/' . $bln . '/' . $tahun)) < 10) {
            return $tahun . '-' . $bln . '-' . '0' . trim($tanggal);
        } else {
            return $tahun . '-' . $bln . '-' . $tanggal;
        }
    }

    // format yyyy-mm-dd 
    // menjadi dd-mm-yyyy
    function showtanggal($tanggal) {
        $tgl = explode('-', $tanggal);
        return $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];
    }

    function datediff($d1, $d2, $d3) {
        $d1 = (is_string($d1) ? strtotime($d1) : $d1);
        $d2 = (is_string($d2) ? strtotime($d2) : $d2);
        $diff_secs = abs($d1 - $d2);
        $base_year = min(date("Y", $d1), date("Y", $d2));
        $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
        $a = array(
            "years" => date("Y", $diff) - $base_year
            , "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1
            , "months" => date("n", $diff) - 1
            , "days_total" => floor($diff_secs / (3600 * 24))
            , "days" => date("j", $diff) - 1
            , "hours_total" => floor($diff_secs / 3600));

        if ($d3 == "A") {
            // all
            echo $a['years'] . ' th ' . $a['months'] . ' bl ' . $a['days'] . ' hr';
        } else if ($d3 == "TB") {
            // tahun bulan
            echo $a['years'] . ' th ' . $a['months'] . ' bl';
        } else if ($d3 == "BH") {
            // bulan hari
            echo $a['months'] . ' bl ' . $a['days'] . ' hr';
        } else if ($d3 == "T") {
            // tahun
            return $a['years'];
        } else if ($d3 == "B") {
            // bulan
            return $a['months_total'];
        } else if ($d3 == "H") {
            // hari
            return $a['days_total'];
        } else if ($d3 == "HT") {
            // jam
            return $a['hours_total'];
        }
    }

    function getBulanEtoI($bln) {
        switch ($bln) {
            case "Jan":
                return "Januari";
                break;
            case "Feb":
                return "Februari";
                break;
            case "Mar":
                return "Maret";
                break;
            case "Apr":
                return "April";
                break;
            case "May":
                return "Mei";
                break;
            case "Jun":
                return "Juni";
                break;
            case "Jul":
                return "Juli";
                break;
            case "Aug":
                return "Agustus";
                break;
            case "Sep":
                return "September";
                break;
            case "Oct":
                return "Oktober";
                break;
            case "Nov":
                return "November";
                break;
            case "Dec":
                return "Desember";
                break;
        }
    }

    function getBulanNumberEng($bln) {
        switch (strtolower($bln)) {
            case "jan":
                return "01";
                break;
            case "feb":
                return "02";
                break;
            case "mar":
                return "03";
                break;
            case "apr":
                return "04";
                break;
            case "may":
                return "05";
                break;
            case "jun":
                return "06";
                break;
            case "jul":
                return "07";
                break;
            case "aug":
                return "08";
                break;
            case "sep":
                return "09";
                break;
            case "0ct":
                return "10";
                break;
            case "nov":
                return "11";
                break;
            case "dec":
                return "12";
                break;
        }
    }

    function getBulanNumberIndo($bln) {
        switch (strtolower($bln)) {
            case "jan":
                return "01";
                break;
            case "feb":
                return "02";
                break;
            case "mar":
                return "03";
                break;
            case "apr":
                return "04";
                break;
            case "mei":
                return "05";
                break;
            case "jun":
                return "06";
                break;
            case "jul":
                return "07";
                break;
            case "agu":
                return "08";
                break;
            case "sep":
                return "09";
                break;
            case "okt":
                return "10";
                break;
            case "nov":
                return "11";
                break;
            case "des":
                return "12";
                break;
        }
    }

}

?>