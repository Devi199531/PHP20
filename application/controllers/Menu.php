<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('login');
        }
        
        $this->load->model('menu_m');
    }

    public function index() {

        $menu = $this->menu_m->get_all();

        $this->template->load('pages/menu/index', ['data' => $menu]);
    }

    public function create() {
        if (!$this->auth->privilege_check('menu','create')) {
           $this->auth->no_access();
            return;
        }

        $parent = $this->menu_m->get_parent();
        $this->template->load('pages/menu/create', ['parent' => $parent]);
    }

    public function store() {
        $post = $this->input->post();

        $result = $this->menu_m->insert($post);
        if ($result) {
            redirect('menu');
        }
    }

    public function edit($id) {
        if (!$this->auth->privilege_check('menu','update')) {
           $this->auth->no_access();
            return;
        }
        $menu = $this->menu_m->get_by_id($id);
        $parent = $this->menu_m->get_parent();
        
        $this->template->load('pages/menu/edit', ['data' => $menu, 'parent' => $parent]);
    }

    public function update($id) {
        $post = $this->input->post();

        $result = $this->menu_m->update($id, $post);
        if ($result) {
            redirect('menu');
        }
    }
    
    public function delete($id) {
        if (!$this->auth->privilege_check('menu','delete')) {
           $this->auth->no_access();
            return;
        }
        $result = $this->menu_m->delete($id);
        if ($result) {
            redirect('menu');
        }
    }
}
