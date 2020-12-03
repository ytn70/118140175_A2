<?php
class Article_model extends CI_Model
{
    public function get_article()
    {
        $query = $this->db->get('article');
        return $query->result_array();
    }

    public function set_article($id = 0)
    {
        $this->load->helper('url');
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'isi' => htmlspecialchars($this->input->post('isi', true)),
            'owned' => $this->session->userdata('id')
        ];
        $data_update = [
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'isi' => htmlspecialchars($this->input->post('isi', true))
        ];
        if ($id == 0) {
            $this->db->insert('article', $data);
            $this->session->set_flashdata('message', '<div style="color: green; padding-left:15px;">Data berhasil ditambahkan!</div>');
            redirect('article/index');
        } else {
            $this->db->where('id', $id);
            return $this->db->update('article', $data_update);
        }
    }

    public function get_article_by_id($id = 0)
    {
        if ($id === 0) {
            $query = $this->db->get('article');
            return $query->result_array();
        }

        $query = $this->db->get_where('article', array('id' => $id));
        return $query->row_array();
    }

    public function delete_article($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('article');
    }
}
