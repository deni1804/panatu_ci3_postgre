<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpantau', 'dbpantau', TRUE);
        $this->load->helper('url', 'date');
        $this->load->helper('form');
        $this->load->helper('security');

        //$this->access_role->is_authorized(uri_string());
        //$this->output->enable_profiler(TRUE);
    }


    public function index()
    {
        if ($this->session->userdata("username") != "") {
            if ($this->session->userdata("userlevel") == 1) {
                $karyawan = $this->dbpantau->get_allkaryawan()->result_array();
                $this->load->view('include/header');
                $this->load->view('list_karyawan', array('karyawan' => $karyawan));
                $this->load->view('include/footer');
            } else {
                redirect('/login/', 'location');
            }
        } else {
            redirect('/login/', 'location');
        }
    }

    public function registration()
    {
        if ($this->session->userdata("username") != "") {
            if ($this->session->userdata("userlevel") == 1) {
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
                    redirect('karyawan/registration');
                }
            } else {
                redirect('/login/', 'location');
            }
        } else {
            redirect('/login/', 'location');
        }
    }

    public function view_editekaryawan($row)
    {
        if ($this->session->userdata("username") != "") {
            if ($this->session->userdata("userlevel") == 1) {
                $data['idkaryawan'] = $this->dbpantau->get_idkaryawan($row);

                $this->load->view('include/header');
                $this->load->view('editekaryawan', $data);
                $this->load->view('include/footer');
            } else {
                redirect('/login/', 'location');
            }
        } else {
            redirect('/login/', 'location');
        }
    }


    public function editekaryawan($row = null)
    {
        if ($this->session->userdata("username") != "") {
            if ($this->session->userdata("userlevel") == 1) {
                $this->load->library('form_validation');
                $this->dbpantau->update_karyawan($row);

                $this->form_validation->set_rules('namalengkap', 'namalengkap', 'required|trim');
                $this->form_validation->set_rules('username', 'Username', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

                if ($this->form_validation->run() == FALSE) {

                    $this->load->view('include/header');
                    $this->load->view('registration');
                    $this->load->view('include/footer');
                } else {
                    $data = [
                        'idkaryawan' => $this->input->post('idkaryawan'),
                        'namalengkap' => $this->input->post('namalengkap'),
                        'username' => htmlspecialchars($this->input->post('username', true)),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'userlevel' => $this->input->post('userlevel')


                    ];

                    $this->db->update('kh_karyawan', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
                    redirect('karyawan/');
                }
            } else {
                redirect('/login/', 'location');
            }
        } else {
            redirect('/login/', 'location');
        }
    }


    public function delete_karyawan()
    {
        if ($this->session->userdata("username") != "") {
            if ($this->session->userdata("userlevel") == 1) {
                $row = $this->input->post('idkaryawan');
                $this->dbpantau->delete_karyawan($row);

                redirect('karyawan/');
            } else {
                redirect('/login/', 'location');
            }
        } else {
            redirect('/login/', 'location');
        }
    }
}
