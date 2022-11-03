<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Pantau extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mpantau', 'dbpantau', TRUE);
		$this->load->library('form_validation');
		$this->load->helper('date');
	}

	public function index()
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$item = $this->dbpantau->get_item()->result_array();
				$pantau = $this->dbpantau->get_pantau()->result_array();
				$this->load->view('include/header');
				$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
				$this->load->view('include/footer');
			} else {
				$item = $this->dbpantau->get_item()->result_array();
				$pantau = $this->dbpantau->get_pantau()->result_array();
				$this->load->view('include/header_user');
				$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
				$this->load->view('include/footer');
			}
		} else {
			redirect('/login/', 'location');
		}
	}
	/*
	public function user()
	{
		if ($this->session->userdata("username") != "") {
			$item = $this->dbpantau->get_item()->result_array();
			$pantau = $this->dbpantau->get_pantau()->result_array();
			$this->load->view('include/header');
			$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
			$this->load->view('include/footer');
		} else {
			redirect('/login/', 'location');
		}
	}
	*/

	public function add_all()
	{
		$item = $this->dbpantau->get_item()->result_array();
		$pantau = $this->dbpantau->get_pantau()->result_array();
		foreach ($item as $row) {
			$this->form_validation->set_rules('keterangan' . $row["iditem"], 'keterangan ' . $row["item"], 'required|xss_clean|prep_for_form');
		}
		if ($this->form_validation->run() == FALSE) {
			if ($this->session->userdata("userlevel") == 1) {
				$this->load->view('include/header');
				$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
				$this->load->view('include/footer');
			} else {
				$this->load->view('include/header_user');
				$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
				$this->load->view('include/footer');
			}
		} else {
			$query = "INSERT INTO ps_pantauansistem (idkaryawan, iditem, status, tingkatstatus, tanggaljam, keterangan) VALUES ";
			//$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
			date_default_timezone_set("Asia/Jakarta");
			$time = date("Y-m-d G:i:s");
			//$time = date("yy-m-d h:i:s");
			foreach ($item as $row) {
				$query .= "(" . $this->session->userdata('userid') . ", " . $this->input->post('item' . $row['iditem']) . ", " . $this->input->post('status' . $row['iditem']) . ", " . $this->input->post('tingkatstatus' . $row['iditem']) . ", '$time','" . $this->input->post('keterangan'  . $row['iditem']) . "'),";
			}
			$query = substr($query, 0, -1);
			$this->dbpantau->insert($query);
			redirect('/pantau/', 'location');
		}
	}
	/*
	public function add()
	{
		$this->form_validation->set_rules('keterangan' . $row["iditem"], 'keterangan ' . $row["item"], 'required|xss_clean|prep_for_form');
		if ($this->form_validation->run() == false) {
			echo "1";
		} else {
			$query = 'INSERT INTO ps_pantauansistem (idkaryawan, iditem, status, tingkatstatus, tanggalJam, keterangan) VALUES (' . $this->session->userdata("userid") . ', ' . $this->input->post("item" . $row["iditem"]) . ', ' . $this->input->post("status" . $row["iditem"]) . ', ' . $this->input->post("tingkatstatus" . $row["iditem"]) . ', now(), "' . mysqli_real_escape_string($this->input->post("keterangan" . $row["iditem"])) . '")';
			$this->dbpantau->insert($query);
			echo site_url() . '/pantau';
			// echo $query;
		}
	}
*/
	public function keterangan()
	{
		$keterangan = $this->dbpantau->get_keterangan($this->input->post("iditem"))->result_array();
		foreach ($keterangan as $row) {
			echo $row["keterangan"];
		}
		//cho $this->input->post("IdItem");
		//echo $keterangan;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
