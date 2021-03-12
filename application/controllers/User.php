<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $role_id;

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->role_id = $this->session->userdata('role_id');
    }

    private function userAccess($role_id)
    {
        $this->db->select("user_menu.id,user_menu.menu");
        $this->db->from('user_menu');
        $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
        $this->db->where('user_access_menu.role_id', $role_id);
        return $this->db->get();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->userAccess($this->role_id)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
}
