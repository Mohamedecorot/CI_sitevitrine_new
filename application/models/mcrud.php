<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {


	function view($sort_by, $sort_order, $condition) {
        $this->db->order_by($sort_by, $sort_order);
        if($condition) {
            $add_by = $this->session->userdata('username');
            $all_product = $this->db->get_where('listeproduits', array('add_by' => $add_by));
        } else {
            $all_product = $this->db->get('listeproduits');
        }
        return $all_product->result();
    }

    function add($data) {
        return $this->db->insert('listeproduits', $data);
    }

    function edit($id) {
        return $this->db->get_where('listeproduits', array('id'=>$id))->row();
    }

    function update($data, $id) {
        return $this->db->update('listeproduits', $data, ['id' => $id]);
    }

    function del($a) {
        $this->db->delete('listeproduits', array('id' => $a));
        return;
    }
}
