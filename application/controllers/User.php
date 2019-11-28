<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect('login');
        }

        $this->load->model('user_m');
        $this->load->model('role_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
    	$user = $this->user_m->get_all();

    	$this->template->load('pages/user/index',['data' => $user]);
    }

    public function create()
    {
    	$role = $this->role_m->get_all();
    	$this->template->load('pages/user/create',['role'=> $role]);
    }

    public function store()
    {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $passwordx = hash('sha512', $password['password']);
            $name = $this->input->post('name');
            $role = $this->input->post('role_id');

            $this->form_validation->set_rules('name','name','required|min_length[5]');
            $this->form_validation->set_rules('username','username','required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('password','password','required|min_length[5]');
            $this->form_validation->set_rules('role_id','role_id','required');

            if ($this->form_validation->run() == FALSE) {
                //memasukan ke array
                $role = $this->role_m->get_all();
            $this->template->load('pages/user/create',['role'=> $role]);
                
            } else {
                $data = array(
                'name' => $name,
                'username' => $username,
                'password' => $passwordx,
                'role_id' => $role);

               $query = $this->user_m->insert($data);
               redirect('user');

            }

    }

    public function edit($id)
    {
    	$user = $this->user_m->get_by_id($id);
    	$role = $this->role_m->get_all();

    	$this->template->load('pages/user/edit',['data' => $user,'role'=> $role]);
    }

    public function update($id)
    {
    	$username = $this->input->post('username');
            $name = $this->input->post('name');
            $role = $this->input->post('role_id');

            $this->form_validation->set_rules('name','name','required|min_length[5]');
            $this->form_validation->set_rules('username','username','required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('role_id','role_id','required');

            if ($this->form_validation->run() == FALSE) {
                //memasukan ke array
                $user = $this->user_m->get_by_id($id);
                $role = $this->role_m->get_all();
            $this->template->load('pages/user/edit',['data' => $user,'role'=> $role]);

            } else {
                $data = array(
                'name' => $name,
                'username' => $username,
                'role_id' => $role);

               $result = $this->user_m->update($id, $data);
               redirect('user');

            }
    }

    public function delete($id)
    {
    	$result = $this->user_m->delete($id);

    	if ($result) {
    		redirect('user');
    	}
    }
}