<?php

class Article_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->user = $this->session->userdata('user');
    }

    function get()
    {
        $sql = "SELECT * FROM articles";
        return $this->db->query($sql)->result();
    }
    function getArticle($id)
    {
        $sql = "SELECT * FROM articles WHERE id = $id";
        return $this->db->query($sql)->row();
    }
    // function delete($id)
    // {
    //     $sql = "DELETE FROM articles WHERE id = $id";
    //     return $this->db->query($sql)->result();
    // }

    function update($data)
    {
        $title = $data["title"];
        $content = $data["content"];
        $id = $data["id"];
        $date_updated = date("Y-m-d");

        $this->db->where('id', $id);
        $this->db->update('articles', $data);
    }

    function add($data)
    {
        return $this->db->insert('articles', $data);
    }
}
