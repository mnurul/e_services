<?php

class Model_customer extends CI_Model
{

    // public function tampil_data(){
    // 	return $this->db->get('tb_barang');
    // }

    public function tampil_data()
    {
        return $this->db->get('tb_customer');
    }

    public function tambah_customer($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_customer($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_customer($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }


    public function detail_customer($id_customer)
    {
        $result = $this->db->where('id_customer', $id_customer)->get('tb_customer');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }



    public function detail_customer_admin($id)
    {
        $result = $this->db->where('id_customer', $id)->get('tb_customer');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
