<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Help extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$this->load->view('include/header');
				$this->load->view('help');
				$this->load->view('include/footer');
			} else {
				$this->load->view('include/header_user');
				$this->load->view('help');
				$this->load->view('include/footer');
			}
		} else {
			redirect('/login/', 'location');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */