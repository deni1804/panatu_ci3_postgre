<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Userlogin', 'dblogin', TRUE);
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('security');

		//$this->access_role->is_authorized(uri_string());
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<tr><td></td><td style="color:red;font-size:10pt;">', '</td>');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_login|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata("username") != "") {
				redirect('/pantau/', 'location');
			} else {
				$this->load->view('login');
			}
		} else {
			if (isset($_GET['req'])) {
				if ($_GET['req'] != '') {
					redirect($_GET['req'], 'location');
				}
			} else {

				redirect('/pantau/', 'location');
			}
		}
	}

	public function check_login()
	{
		$result = $this->dblogin->check_login($this->input->post('username'), md5($this->input->post('password')));
		if ($result) {
			$row = $result->row(0);
			$this->session->set_userdata(
				array(
					'is_loggedin' => TRUE,
					'userid' => $row->idkaryawan,
					'username' => $row->username,
					'password' => $row->password,
					'nama' => $row->namalengkap,
					'userlevel' => $row->userlevel,
				)
			);
			return TRUE;
		} else {
			$this->form_validation->set_message('check_login', 'Invalid Username or Password');
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */