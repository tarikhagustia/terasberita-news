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
        $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
        $t = htmlentities($t, ENT_QUOTES, "UTF-8");
        if($start == NULL && $end == NULL):
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
}
