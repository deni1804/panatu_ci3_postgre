<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mpantau', 'dbpantau', TRUE);
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		if ($this->session->userdata("username") != "") {
			$kemaren = $this->dbpantau->get_history(2)->result_array();
			$sekarang = $this->dbpantau->get_history(1)->result_array();
			$karyawan = $this->dbpantau->get_karyawan(1)->result_array();
			if ($this->session->userdata("userlevel") == 1) {

				$this->load->view('include/header');
				$this->load->view('history', array('kemaren' => $kemaren, 'sekarang' => $sekarang, 'karyawan' => $karyawan,));
				$this->load->view('include/footer');
			} else {
				$this->load->view('include/header_user');
				$this->load->view('history', array('kemaren' => $kemaren, 'sekarang' => $sekarang, 'karyawan' => $karyawan,));
				$this->load->view('include/footer');
			}
		} else {
			redirect('/login/', 'location');
		}
	}

	public function history_karyawan()
	{
		if ($this->session->userdata("username") != "") {
			$historyall = $this->dbpantau->get_historyall()->result_array();
			$idkaryawan = $this->dbpantau->get_historykaryawan()->result_array();

			if ($this->session->userdata("userlevel") == 1) {
				$this->load->view('include/header');
				$this->load->view('history_karyawan', array('historyall' => $historyall, 'idkaryawan' => $idkaryawan));
				$this->load->view('include/footer');
			} else {
				$this->load->view('include/header_user');
				$this->load->view('history_karyawan', array('historyall' => $historyall, 'idkaryawan' => $idkaryawan));
				$this->load->view('include/footer');
			}
		} else {
			redirect('/login/', 'location');
		}
	}

	public function item()
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$item = $this->dbpantau->get_allitem()->result_array();
				$this->load->view('include/header');
				$this->load->view('item', array('item' => $item));
				$this->load->view('include/footer');
			} else {
				redirect('/login/', 'location');
			}
		} else {
			redirect('/login/', 'location');
		}
	}

	public function view_additem()
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$this->load->view('include/header');
				$this->load->view('additem');
				$this->load->view('include/footer');
			} else {
				redirect('/login/', 'location');
			}
		} else {
			redirect('/login/', 'location');
		}
	}

	public function add_item()
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				//$this->form_validation->set_rules('iditem', 'Iditem', 'required|trim|is_unique[ps_itempantauan.iditem]');
				$this->form_validation->set_rules('itemname', 'Itemname', 'required|trim|is_unique[ps_itempantauan.item]');
				$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

				if ($this->form_validation->run() == false) {

					$this->load->view('include/header');
					$this->load->view('additem');
					$this->load->view('include/footer');
				} else {
					$data = [
						//'iditem' => $this->input->post('iditem'),
						'item' => htmlspecialchars($this->input->post('itemname', true)),
						'idstatus' => $this->input->post('idstatus'),
						//	'sort' => $this->input->post('iditem'),
						'keterangan' => $this->input->post('keterangan'),
						//'IdKaryawan' => $this->input->post('idkaryawan')



					];

					$this->db->insert('ps_itempantauan', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
					redirect('history/item');
				}
			} else {
				redirect('/login/', 'location');
			}
		} else {
			redirect('/login/', 'location');
		}
	}

	public function view_edititem($row)
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$data['iditem'] = $this->dbpantau->get_iditem($row);

				$this->load->view('include/header');
				$this->load->view('edititem', $data);
				$this->load->view('include/footer');
			} else {
				redirect('/login/', 'location');
			}
		} else {
			redirect('/login/', 'location');
		}
	}

	public function edit_item($row = null)
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$this->dbpantau->update_item($row);
				$this->form_validation->set_rules('iditem', 'iditem', 'required|trim');
				$this->form_validation->set_rules('itemname', 'itemname', 'required|trim');
				$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');

				if ($this->form_validation->run() == false) {

					$this->load->view('include/header');
					$this->load->view('additem');
					$this->load->view('include/footer');
				} else {
					$data = [
						'iditem' => $this->input->post('iditem'),
						'item' => htmlspecialchars($this->input->post('itemname', true)),
						'idstatus' => $this->input->post('idstatus'),
						//'sort' => $this->input->post('iditem'),
						'keterangan' => $this->input->post('keterangan')



					];
					$this->db->UPDATE('ps_itempantauan', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
					redirect('history/item');
				}
			} else {
				redirect('/login/', 'location');
			}
		} else {
			redirect('/login/', 'location');
		}
	}



	public function delete_item()
	{
		if ($this->session->userdata("username") != "") {
			if ($this->session->userdata("userlevel") == 1) {
				$row = $this->input->post('iditem');
				$this->dbpantau->delete_item($row);

				redirect('history/item');
			} else {
				redirect('/login/', 'location');
			}
		} else {
			redirect('/login/', 'location');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */