<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }

	public function index($sort_by = '', $sort_order = '')
	{
		// Vérification du choix du visiteur pour le tri des produits
		if ($this->input->post('post-order-by') == 'categorie_desc') {
			$sort_by = 'categorie';
			$sort_order = 'DESC';
		} elseif ($this->input->post('post-order-by') == 'categorie_asc'){
			$sort_by = 'categorie';
			$sort_order = 'ASC';
		} elseif ($this->input->post('post-order-by') == 'prix_desc') {
			$sort_by = 'prix';
			$sort_order = 'DESC';
		} elseif ($this->input->post('post-order-by') == 'prix_asc') {
			$sort_by = 'prix';
			$sort_order = 'ASC';
		} else {
			$sort_by = 'id';
			$sort_order = 'DESC';
		}

		$data['title'] = "Liste des produits";
		$data['mydata'] = $this->mcrud->view($sort_by, $sort_order);

		$this->load->view('header', $data);
		$this->load->view('afficher_produit', $data);
		$this->load->view('footer');
	}

	public function data($sort_by = 'id', $sort_order = 'desc')
	{
		$data['title'] = "Listes des produits";
		$data['mydata'] = $this->mcrud->view($sort_by = 'id', $sort_order = 'desc');

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


	public function save () {
		$config = array(
			array(
				'field' => 'nom',
				'label' => 'nom',
				'rules' => 'required|min_length[3]|max_length[50]|alpha',
				'errors' => array(
					'required'  => 'Merci de rentrer le %s du produit',
					'min_length' => 'Le %s doit avoir au moins 3 lettres',
					'max_length' => 'Le %s doit avoir au maximum 50 lettres',
					'alpha' => 'Le %s ne doit comporter que des lettres',
				),
			),
			array(
				'field' => 'description',
				'label' => 'description',
				'rules' => 'required|min_length[3]|max_length[250]',
				'errors' => array(
					'required'  => 'Merci de rentrer la %s du produit',
					'min_length' => 'La %s doit avoir au moins 3 lettres',
					'max_length' => 'La %s doit avoir au maximum 250 lettres',
				),
			),
			array(
				'field' => 'categorie',
				'label' => 'categorie',
				'rules' => 'required|min_length[3]|max_length[50]|alpha',
				'errors' => array(
					'required'  => 'Merci de rentrer la %s du produit',
					'min_length' => 'La %s doit avoir au moins 3 lettres',
					'max_length' => 'La %s doit avoir au maximum 50 lettres',
					'alpha' => 'La %s ne doit comporter que des lettres',
				),
			),
			array(
				'field' => 'illustration',
				'label' => 'illustration',
				'rules' => 'uploaded',
				'errors' => array(
					'uploaded'  => 'Merci d\'inserer une %s du produit'
				),
			),
			array(
				'field' => 'prix',
				'label' => 'prix',
				'rules' => 'required|alpha_numeric',
				'errors' => array(
					'required'  => 'Merci de rentrer le %s du produit',
					'alpha_numeric' => 'Le %s doit être un chiffre'
				),
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Erreur: rajoutez le produit";
			$this->load->view('header', $data);
			$this->load->view('admin/add');
			$this->load->view('footer');
		} else {
			$data = [
				'nom' =>  $this->input->post('nom'),
				'description' =>  $this->input->post('description'),
				'categorie' =>  $this->input->post('categorie'),
				'prix' =>  $this->input->post('prix')
			];

			$config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000"
				);

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('illustration')){
				// $error = $this->upload->display_errors('', '');
				// $data['error'] = $error;
				$data['title'] = "Erreur sur le fichier";

				$this->load->view('header', $data);
				$this->load->view('admin/add', $data);
				$this->load->view('footer');
			} else {
				//file is uploaded successfully
				//now get the file uploaded data
				$upload_data = $this->upload->data();
				//get the uploaded file name
				$data['illustration'] = $upload_data['file_name'];
				//store pic data to the db
				$this->mcrud->add($data);
				redirect('crud/data', 'refresh');
			}
		}
	}


	public function update($id) {
		$config = array(
			array(
				'field' => 'nom',
				'label' => 'nom',
				'rules' => 'required|min_length[3]|max_length[50]|alpha',
				'errors' => array(
					'required'  => 'Merci de rentrer le %s du produit',
					'min_length' => 'Le %s doit avoir au moins 3 lettres',
					'max_length' => 'Le %s doit avoir au maximum 50 lettres',
					'alpha' => 'Le %s ne doit comporter que des lettres',
				),
			),
			array(
				'field' => 'description',
				'label' => 'description',
				'rules' => 'required|min_length[3]|max_length[250]',
				'errors' => array(
					'required'  => 'Merci de rentrer la %s du produit',
					'min_length' => 'La %s doit avoir au moins 3 lettres',
					'max_length' => 'La %s doit avoir au maximum 250 lettres',
				),
			),
			array(
				'field' => 'categorie',
				'label' => 'categorie',
				'rules' => 'required|min_length[3]|max_length[50]|alpha',
				'errors' => array(
					'required'  => 'Merci de rentrer la %s du produit',
					'min_length' => 'La %s doit avoir au moins 3 lettres',
					'max_length' => 'La %s doit avoir au maximum 50 lettres',
					'alpha' => 'La %s ne doit comporter que des lettres',
				),
			),
			array(
				'field' => 'illustration',
				'label' => 'illustration',
				'rules' => 'uploaded',
				'errors' => array(
					'uploaded'  => 'Merci d\'inserer une %s du produit'
				),
			),
			array(
				'field' => 'prix',
				'label' => 'prix',
				'rules' => 'required|alpha_numeric',
				'errors' => array(
					'required'  => 'Merci de rentrer le %s du produit',
					'alpha_numeric' => 'Le %s doit être un chiffre'
				),
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'nom' =>  $this->input->post('nom'),
				'description' =>  $this->input->post('description'),
				'categorie' =>  $this->input->post('categorie'),
				'prix' =>  $this->input->post('prix')
			];

			$config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000"
				);

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('illustration')){
				$error = $this->upload->display_errors('', '');
				$data['error'] = $error;
				$data['title'] = "Erreur sur le fichier";

				$this->load->view('header', $data);
				$this->load->view('admin/add', $data);
				$this->load->view('footer');
			} else {
				$upload_data = $this->upload->data();
				//get the uploaded file name
				$data['illustration'] = $upload_data['file_name'];
				//store pic data to the db
				$this->mcrud->update($data, $id);
				redirect('crud/data', 'refresh');
			}
		}
	}

	public function edit() {
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

	public function del() {
		$id = $this->uri->segment(3);
		$this->mcrud->del($id);
		redirect('crud/data', 'refresh');
	}
}
