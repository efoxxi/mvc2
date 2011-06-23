<?php

class Members extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('membersmodel');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index() {
        $data['title'] = "Members application";
        $data['heading'] = "Members list";
        $data['res'] = $this->membersmodel->get_all_members();
        $this->load->view('membersview', $data);
    }

    function delete() {
        $this->membersmodel->delete();
        redirect('members/index');
    }

    function add() {
        $data['title'] = "Add Member";
        $data['heading'] = "Add Member";
        $this->load->view('membersadd', $data);
    }

    function insert() {
        $data = $_POST;
        $this->membersmodel->insert($data);
        redirect('members/index');
    }

    function edit() {
        $data['title'] = "Edit Member";
        $data['heading'] = "Edit Member";

        $this->db->where('id', $this->uri->segment(3));
        $data['query'] = $this->db->get('members');
        $this->load->view('membersedit', $data);
    }

    function update() {
        $data = $_POST;
        $this->membersmodel->update($data);
        redirect('members/index');
    }

    function restoredb() {
        $this->membersmodel->restoredb();
        redirect('members/index');
    }

}

?>
