<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
			$item = $this->dbpantau->get_item()->result_array();
			$pantau = $this->dbpantau->get_pantau()->result_array();
			$this->load->view('include/header');
			$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
			$this->load->view('include/footer');
		} else {
			redirect('/login/', 'location');
		}
	}

	public function add_all()
	{
		$item = $this->dbpantau->get_item()->result_array();
		$pantau = $this->dbpantau->get_pantau()->result_array();
		foreach ($item as $row) {
			$this->form_validation->set_rules('keterangan' . $row["IdItem"], 'Keterangan ' . $row["Item"], 'required|xss_clean|prep_for_form');
		}
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('include/header');
			$this->load->view('pantau', array('item' => $item, 'pantau' => $pantau));
			$this->load->view('include/footer');
		} else {
			$query = 'INSERT INTO ps_pantauansistem (IdKaryawan, IdItem, Status, TingkatStatus, TanggalJam, Keterangan) VALUES ';
			$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
			$time = time();
			foreach ($item as $row) {
				$query .= '(' . $this->session->userdata("userid") . ', ' . $this->input->post("item" . $row["IdItem"]) . ', ' . $this->input->post("status" . $row["IdItem"]) . ', ' . $this->input->post("tingkatstatus" . $row["IdItem"]) . ', now(), "' . $this->input->post("keterangan" . $row["IdItem"]) . '"),';
			}
			$query = substr($query, 0, -1);
			$this->dbpantau->insert($query);
			redirect('/pantau/', 'location');
		}
	}

	public function add()
	{
		$this->form_validation->set_rules('keterangan' . $row["IdItem"], 'Keterangan ' . $row["Item"], 'required|xss_clean|prep_for_form');
		if ($this->form_validation->run() == false) {
			echo "1";
		} else {
			$query = 'INSERT INTO ps_pantauansistem (IdKaryawan, IdItem, Status, TingkatStatus, TanggalJam, Keterangan) VALUES (' . $this->session->userdata("userid") . ', ' . $this->input->post("item" . $row["IdItem"]) . ', ' . $this->input->post("status" . $row["IdItem"]) . ', ' . $this->input->post("tingkatstatus" . $row["IdItem"]) . ', now(), "' . mysqli_real_escape_string($this->input->post("keterangan" . $row["IdItem"])) . '")';
			$this->dbpantau->insert($query);
			echo site_url() . '/pantau';
			// echo $query;
		}
	}

	public function keterangan()
	{
		$keterangan = $this->dbpantau->get_keterangan($this->input->post("IdItem"))->result_array();
		foreach ($keterangan as $row) {
			echo $row["Keterangan"];
		}
		//cho $this->input->post("IdItem");
		//echo $keterangan;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
