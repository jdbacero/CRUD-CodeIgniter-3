<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Controller
{
    // protected $article;
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_Model');
    }

    public function index()
    {
        $data["articles"] =  $this->Article_Model->get();
        $this->load->view('article-view', $data);
    }

    public function add()
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $data = [
            "title" => $title,
            "content" => $content
        ];
        $this->Article_Model->add($data);
        redirect('/');
    }

    public function edit($id)
    {
        $article =  $this->Article_Model->getArticle($id);
        $data["title"] = $article->title;
        $data["content"] = $article->content;
        $data["id"] = $id;

        // print_r($data);
        $this->load->view('article-edit', $data);
    }

    public function update($id)
    {
        // return "test";
        $data = [
            "id" => $id,
            "title" => $_POST["title"],
            "content" => $_POST["content"],
        ];
        $update = $this->Article_Model->update($data);
        redirect('/');
    }

    public function delete($id)
    {
        // $this->Article_Model->delete($id);
        $this->db->delete('articles', array('id' => $id));
        redirect('/');
    }
}
