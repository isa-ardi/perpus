<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->db->get('perpustakaan')->result_array();

        $this->form_validation->set_rules('nama', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'kondisi' => $this->input->post('kondisi'),
                'keterangan' => $this->input->post('keterangan'),
                'jumlah' => $this->input->post('jumlah'),
                'tanggal_register' => $this->input->post('tanggal_register'),
            ];
            $this->db->insert('perpustakaan', $data);
            $this->session->set_flashdata('perpustakaan_message', '<div class="alert alert-success" role="alert">New data added!</div>');
            redirect('admin');
        }
    }
}
