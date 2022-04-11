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
					'nama' => $row->namalengkap
				)
			);
			return TRUE;
		} else {
			$this->form_validation->set_message('check_login', 'Invalid Username or Password');
			return FALSE;
		}
	}

	public function registration()

	{

		if ($this->session->userdata("username") != "") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[kh_karyawan.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[kh_karyawan.email]');
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


			if ($this->form_validation->run() == FALSE) {

				$this->load->view('include/header');
				$this->load->view('registration');
				$this->load->view('include/footer');
			} else {
				$data = [
					'username' => htmlspecialchars($this->input->post('username', true)),
					'password' => md5($this->input->post('password1')),
					'namalengkap' => $this->input->post('name'),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'userlevel' => $this->input->post('userlevel')


				];

				$this->db->insert('kh_karyawan', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
				redirect('login/registration');
			}
		} else {
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */