<?php
class Home extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        redirect(base_url("laporan/tahfidz"));
    }
}