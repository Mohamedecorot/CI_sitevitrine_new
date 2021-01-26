<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		parent::__construct();
    }

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

	public function save(){
        if ($this->form_validation->run() == FALSE){
			$data['title'] = "Erreur: rajouter le produit";
			$this->load->view('header', $data);
			$this->load->view('admin/add');
			$this->load->view('footer');
        } else {
            $data['nom'] = $this->input->post('nom', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['categorie'] = $this->input->post('categorie', TRUE);
            $data['prix'] = $this->input->post('prix', TRUE);

			$config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000"
				);
			$this->form_validation->set_message('allowed_types', 'Veuillez uploader un fichier au bon format gif, jpg, png, jpeg');

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('illustration')){
				//$error = array('error' => $this->upload->display_errors('', ''));
				$error = $this->upload->display_errors('', '');
                $data['error'] = $error;
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
                redirect('crud', 'refresh');
            }
            $this->load->view('footer');
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
		redirect('crud/data', 'refresh');
	}
}
