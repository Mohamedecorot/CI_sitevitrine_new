<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function index()
	{
		$data['title'] = "View CRUD";
		$data['mydata'] = $this->mcrud->view();
		$this->load->view('header', $data);
		$this->load->view('data', $data);
		$this->load->view('footer');
	}

	public function add()
	{
		$data['title'] = "Add CRUD";
		$this->load->view('header', $data);
		$this->load->view('add');
		$this->load->view('footer');
	}

	public function save() {
		if($this->input->post('save')){
			$this->mcrud->add();
			redirect('crud', 'refresh');
		} else {
			redirect('crud/add', 'refresh');
		}
	}

	public function choose() {
		$kd = $this->uri->segment(3);
		if($kd == null){
			redirect('crud');
		}
		$dt = $this->mcrud->edit($kd);
		$data['nm'] = $dt->name;
		$data['em'] = $dt->email;
		$data['hp'] = $dt->phone;
		$data['al'] = $dt->address;
		$data['id'] = $kd;
		$data['title'] = "Edit CRUD";
		$this->load->view('header', $data);
		$this->load->view('edit', $data);
		$this->load->view('footer');
	}

	public function update() {
		if($this->input->post('edit')) {
			$id = $this->input->post('id');
			$this->mcrud->update($id);
			redirect('crud', 'refresh');
		} else {
			$id = $this->input->post('id');
			redirect('crud/choose/'.$id, 'refresh');
		}
	}

	public function del() {
		$u = $this->uri->segment(3);
		$this->mcrud->del($u);
		redirect('crud', 'refresh');
	}
}
