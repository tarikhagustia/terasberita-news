<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// include_once("$_SERVER[DOCUMENT_ROOT]/includes/functions.php");
// include_once("$_SERVER[DOCUMENT_ROOT]/classes/Manager.class.php");
include_once "$_SERVER[DOCUMENT_ROOT]/classes/User.class.php";

class Nativesession
{
    public function __construct()
    {
        session_start();
        // $this->load->model('Shop_model', 'basicmodel');
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function regenerateId($delOld = false)
    {
        session_regenerate_id($delOld);
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
    public function logout()
    {
        session_unset();
    }
    public function getObject($key)
    {
        return isset($_SESSION['user']->$key) ? $_SESSION['user']->$key : null;   
    }
}
