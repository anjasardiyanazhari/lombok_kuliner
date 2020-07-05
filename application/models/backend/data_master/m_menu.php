<?php

class m_menu extends CI_Model
{


    // Detail Tbl Pegawai
    public function getAll()
    {
        return $this->db->get('tbl_menu')->result();
    }

    // Tambah Data Fasilitas
    public function simpan_add($data)
    {
        $this->db->insert('tbl_menu', $data);
    }

    // Edit Data Fasilitas - Untuk Mengambil Detail Data
    public function getWhere($id_menu)
    {
        return $this->db->where('id_menu', $id_menu)->get('tbl_menu')->row();
    }

    // Edit Data Fasilitas - Simpan Setelah Diedit
    public function simpan_edit($id_menu, $data)
    {
        $this->db->where('id_menu', $id_menu)->update('tbl_menu', $data);
    }

    // Get Data Untuk home Fasilitas Pagination
    public function menu($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->where('tbl_menu.status', 'Publish');
        $this->db->group_by('tbl_menu.id_menu');
        $this->db->order_by('id_menu', 'desc');
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    // Total Fasilitas Untuk home Fasilitas Pagination
    public function total_menu()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tbl_menu');
        $this->db->where('status', 'publish');

        $query = $this->db->get();
        return $query->row();
    }

    // Delete Data Fasilitas
    public function delete($id_menu)
    {
        $this->db->delete('tbl_menu', array('id_menu' => $id_menu));
    }

    // Detail Delete Foto Video - Untuk Mengambil Foto 
    public function getWhereDeleteFoto($id_menu)
    {
        return $this->db->where('id_menu', $id_menu)->get('tbl_menu')->row();
    }
}
