<?php
//  Dans cette class on va faire les requetes SQL pour les posts
// On commence par instacier la class Database pour pouvoir faire des requetes SQL
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts");

        return $this->db->findAll();
    }

    public function getPostById($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->findOne();
    }
}