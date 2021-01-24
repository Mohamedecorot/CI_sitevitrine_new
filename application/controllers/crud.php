<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function index()
	{
		$data['title'] = "Liste des produits";
		$data['mydata'] = $this->mcrud->view();

		$this->load->view('header', $data);
		$this->load->view('afficher_produit', $data);
		$this->load->view('footer');
	}

	public function data()
	{
		$data['title'] = "Listes des produits";
		$data['mydata'] = $this->mcrud->view();

		$this->load->view('header', $data);
		$this->load->view('admin/data');
		$this->load->view('footer');
	}

	public function add()
	{
		$data['title'] = "Ajouter un produit";
		$this->load->view('header', $data);
		$this->load->view('admin/add');
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

	public function choisir() {
		$id = $this->uri->segment(3);
		if($id == null){
			redirect('crud');
		}
		$dt = $this->mcrud->edit($id);
		$data['id'] = $id;
		$data['nom'] = $dt->nom;
		$data['description'] = $dt->description;
		$data['categorie'] = $dt->categorie;
		$data['illustration'] = $dt->illustration;
		$data['prix'] = $dt->prix;

		$data['title'] = "Modifier un produit";
		$this->load->view('header', $data);
		$this->load->view('admin/edit', $data);
		$this->load->view('footer');
	}

	public function update() {
		if($this->input->post('edit')) {
			$id = $this->input->post('id');
			$this->mcrud->update($id);
			redirect('crud', 'refresh');
		} else {
			$id = $this->input->post('id');
			redirect('crud/choisir/'.$id, 'refresh');
		}
	}

	public function del() {
		$id = $this->uri->segment(3);
		$this->mcrud->del($id);
		redirect('crud', 'refresh');
	}
}
