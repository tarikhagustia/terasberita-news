<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// include_once("$_SERVER[DOCUMENT_ROOT]/includes/functions.php");
// include_once("$_SERVER[DOCUMENT_ROOT]/classes/Manager.class.php");

class Format
{
    public function __construct()
    {

    }

    public function set_rp($number = 0)
    {
        $data = number_format($number);

        return "Rp. " . $data;
    }

    public function stripHTMLtags($str, $start = null, $end = null)
    {

        $str = strip_tags($str);
        $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
        $t = htmlentities($t, ENT_QUOTES, "UTF-8");
        if ($start == null && $end == null):
        else:
            $t = substr($t, $start, $end);
        endif;
        return $t;
    }
    public function seoUrl($string)
    {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
    public function url_dash($string)
    {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        // $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        // $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
    public function getFirstNameWithEs($name){
      // var_dump($name);
        if($name != NULL):
        $pecah = explode(" ", $name);
        if (count($pecah > 0)) {
            # code...

            return array_shift($pecah)."'s";
        }else{
            return NULL;
        }
      else:
        return NULL;
      endif;


    }


    public function date_indonesia($date, $pukul = false)
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
    public function date_periode($date){
        $d = explode(' - ', $date);
        return array('date_from' => $d[0], 'date_to' => $d[1]);
    }
}
