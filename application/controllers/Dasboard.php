<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
            // $pantau = $this->dbpantau->get_pantau()->result_array();
            $sekarang = $this->dbpantau->get_history(9)->result_array();
            $kemaren = $this->dbpantau->get_history(10)->result_array();
            $portdata = $this->dbpantau->get_history(3)->result_array();
            $aissat = $this->dbpantau->get_history(4)->result_array();
            $m2prime = $this->dbpantau->get_history(5)->result_array();
            $mobileapp = $this->dbpantau->get_history(6)->result_array();
            $mrtg = $this->dbpantau->get_history(7)->result_array();
            $web = $this->dbpantau->get_history(8)->result_array();

            $this->load->view('include/header');
            $this->load->view('dasboard', array('kemaren' => $kemaren, 'sekarang' => $sekarang, 'portdata' => $portdata, 'aissat' => $aissat, 'm2prime' => $m2prime, 'mobileapp' => $mobileapp, 'mrtg' => $mrtg, 'web' => $web));
            $this->load->view('include/footer');
        } else {
            redirect('/login/', 'location');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */