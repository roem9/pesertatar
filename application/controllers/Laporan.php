<?php
class Laporan extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Main_model");
    }

    public function tahfidz($no_peserta = ""){
        
        $data['title'] = "Laporan Peserta";
        $peserta = $this->Main_model->get_one("peserta", ["md5(no_peserta)" => $no_peserta]);
        $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $peserta['id_kelas']]);
        $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
        $jadwal = $this->Main_model->get_all("jadwal", ["id_kelas" => $peserta['id_kelas'], "status" => "aktif"]);

        $data['nama_peserta'] = $peserta['nama_peserta'];
        $data['nama_kpq'] = $kpq['nama_kpq'];
        $data['jadwal'] = $jadwal;
        $data['program'] = $kelas['program'];

        $data['setoran'] = $this->Main_model->get_all("setoran_tahfidz", ["no_peserta" => $peserta['no_peserta'], "hapus" => 0]);

        $this->load->view("templates/header-login", $data);
        $this->load->view("pages/setoran-tahfidz", $data);
        $this->load->view("templates/footer");
    }

    public function tahsin($no_peserta = ""){
        
        $data['title'] = "Laporan Peserta";
        $peserta = $this->Main_model->get_one("peserta", ["md5(no_peserta)" => $no_peserta]);
        $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $peserta['id_kelas']]);
        $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
        $jadwal = $this->Main_model->get_all("jadwal", ["id_kelas" => $peserta['id_kelas'], "status" => "aktif"]);

        $data['nama_peserta'] = $peserta['nama_peserta'];
        $data['nama_kpq'] = $kpq['nama_kpq'];
        $data['jadwal'] = $jadwal;
        $data['program'] = $kelas['program'];

        $data['setoran'] = $this->Main_model->get_all("laporan_tahsin", ["no_peserta" => $peserta['no_peserta'], "hapus" => 0]);

        $this->load->view("templates/header-login", $data);
        $this->load->view("pages/laporan-tahsin", $data);
        $this->load->view("templates/footer");
    }

    public function b_arab($no_peserta = ""){
        
        $data['title'] = "Laporan Peserta";
        $peserta = $this->Main_model->get_one("peserta", ["md5(no_peserta)" => $no_peserta]);
        $kelas = $this->Main_model->get_one("kelas", ["id_kelas" => $peserta['id_kelas']]);
        $kpq = $this->Main_model->get_one("kpq", ["nip" => $kelas['nip']]);
        $jadwal = $this->Main_model->get_all("jadwal", ["id_kelas" => $peserta['id_kelas'], "status" => "aktif"]);

        $data['nama_peserta'] = $peserta['nama_peserta'];
        $data['nama_kpq'] = $kpq['nama_kpq'];
        $data['jadwal'] = $jadwal;
        $data['program'] = $kelas['program'];

        $data['setoran'] = $this->Main_model->get_all("laporan_arab", ["no_peserta" => $peserta['no_peserta'], "hapus" => 0]);

        $this->load->view("templates/header-login", $data);
        $this->load->view("pages/laporan-arab", $data);
        $this->load->view("templates/footer");
    }
}