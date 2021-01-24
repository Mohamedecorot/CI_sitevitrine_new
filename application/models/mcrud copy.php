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

    function add(){
        $nm = $this->input->post('nm');
        $em = $this->input->post('em');
        $hp = $this->input->post('hp');
        $al = $this->input->post('al');
        $data = array(
            'name' => $nm,
            'email' => $em,
            'phone' => $hp,
            'address' => $al
        );
        $this->db->insert('listeproduits', $data);
    }

    function edit($a){
        $d = $this->db->get_where('listeproduits', array('id'=>$a))->row();
        return $d;
    }

    function update($id){
        $nm = $this->input->post('nm');
        $em = $this->input->post('em');
        $hp = $this->input->post('hp');
        $al = $this->input->post('al');
        $data = array(
            'name' => $nm,
            'email' => $em,
            'phone' => $hp,
            'address' => $al
        );
        $this->db->where('id', $id);
        $this->db->update('listeproduits', $data);
    }

    function del($a) {
        $this->db->delete('listeproduits', array('id' => $a));
        return;
    }
}
