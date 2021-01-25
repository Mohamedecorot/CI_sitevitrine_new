<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {


	function view()
	{
        $importer = $this->db->get('listeproduits');
        if($importer->num_rows() > 0) {
            foreach ($importer->result() as $data) {
                $resultat[] = $data;
            }
            return $resultat;
        }
    }

    function add($data){
        $insert_data['nom'] = $data['nom'];
        $insert_data['description'] = $data['description'];
        $insert_data['categorie'] = $data['categorie'];
        $insert_data['illustration'] = $data['illustration'];
        $insert_data['prix'] = $data['prix'];
        $this->db->insert('listeproduits', $insert_data);
    }

    function edit($id){
        $id = $this->db->get_where('listeproduits', array('id'=>$id))->row();
        return $id;
    }

    function update($id){
        $nom = $this->input->post('nom');
        $description = $this->input->post('description');
        $categorie = $this->input->post('categorie');
        $illustration = $this->input->post('illustration');
        $prix = $this->input->post('prix');
        $data = array(
            'nom' => $nom,
            'description' => $description,
            'categorie' => $categorie,
            'illustration' => $illustration,
            'prix' => $prix
        );
        $this->db->where('id', $id);
        $this->db->update('listeproduits', $data);
    }

    function del($a) {
        $this->db->delete('listeproduits', array('id' => $a));
        return;
    }
}
