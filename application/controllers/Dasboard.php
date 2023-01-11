<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Dasboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mpantau', 'dbpantau', TRUE);
        $this->load->helper('date');
    }

    public function index()
    {
        if ($this->session->userdata("username") != "") {
            $sekarang = $this->dbpantau->get_dasboard(9)->result_array();
            $kemaren = $this->dbpantau->get_dasboard(10)->result_array();
            $portdata = $this->dbpantau->get_dasboard(3)->result_array();
            $aissat = $this->dbpantau->get_dasboard(4)->result_array();
            $m2prime = $this->dbpantau->get_dasboard(5)->result_array();
            $mobileapp = $this->dbpantau->get_dasboard(6)->result_array();
            $mrtg = $this->dbpantau->get_dasboard(7)->result_array();
            $web = $this->dbpantau->get_dasboard(8)->result_array();
            $gps = $this->dbpantau->get_dasboard(11)->result_array();
            $primasaver = $this->dbpantau->get_dasboard(12)->result_array();
            $monstrack = $this->dbpantau->get_dasboard(13)->result_array();
            $kabelbawah = $this->dbpantau->get_dasboard(14)->result_array();
            $harian = $this->dbpantau->get_karyawan(1)->result_array();
            $yesterday = $this->dbpantau->get_karyawan(2)->result_array();
            $bulan = $this->dbpantau->get_bulan()->result_array();



            if ($this->session->userdata("userlevel") == 1) {

                $allrepots = $this->dbpantau->get_karyawan(3)->result_array();



                $this->load->view('include/header');
                $this->load->view('dasboard', array('kemaren' => $kemaren, 'sekarang' => $sekarang, 'portdata' => $portdata, 'aissat' => $aissat, 'm2prime' => $m2prime, 'mobileapp' => $mobileapp, 'mrtg' => $mrtg, 'web' => $web, 'harian' => $harian, 'gps' => $gps, 'yesterday' => $yesterday, 'allrepots' => $allrepots, 'primasaver' => $primasaver, 'bulan' => $bulan, 'monstrack' => $monstrack, 'kabelbawah' => $kabelbawah));
                $this->load->view('include/footer');
            } else {

                $allrepots = $this->dbpantau->get_karyawan(4)->result_array();



                $this->load->view('include/header_user');
                $this->load->view('dasboard', array('kemaren' => $kemaren, 'sekarang' => $sekarang, 'portdata' => $portdata, 'aissat' => $aissat, 'm2prime' => $m2prime, 'mobileapp' => $mobileapp, 'mrtg' => $mrtg, 'web' => $web, 'harian' => $harian, 'gps' => $gps, 'yesterday' => $yesterday, 'allrepots' => $allrepots));
                $this->load->view('include/footer');
            }
        } else {
            redirect('/login/', 'location');
        }
    }

    public function count_karyawan()
    {
        if ($this->session->userdata("username") != "") {
            $month = $this->dbpantau->get_bulankaryawan()->result_array();
            $jumlah = $this->dbpantau->get_jumlah()->result_array();
            $idkaryawan = $this->dbpantau->get_historykaryawan()->result_array();

            if ($this->session->userdata("userlevel") == 1) {
                $this->load->view('include/header');
                $this->load->view('count_karyawan', array('idkaryawan' => $idkaryawan, 'month' => $month, 'jumlah' => $jumlah));
                $this->load->view('include/footer');
            } else {
                $this->load->view('include/header_user');
                $this->load->view('count_karyawan', array('idkaryawan' => $idkaryawan));
                $this->load->view('include/footer');
            }
        } else {
            redirect('/login/', 'location');
        }
    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */