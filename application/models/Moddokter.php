<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Moddokter extends CI_Model
{
    function get_dokter()
    {
        $data = $this->db->query("
            SELECT *
            FROM data_dokter
            ORDER BY id DESC");
        return $data->result_array();
    }
    function edit_dokter($id)
    {
        $data = $this->db->query("
            SELECT *, IF(
                jk='P','Perempuan','Laki-laki'
            ) AS jenis_kelamin
            FROM data_dokter 
            WHERE id='$id'
            ORDER BY id DESC");
        return $data->result_array();
    }

    function update_dokter($data, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->update('data_dokter', $data);

        return $q;
    }

    function hapus_dokter($id)
    {
        $q = $this->db->where('id', $id)->delete('data_dokter');
        return $q;
    }
}
