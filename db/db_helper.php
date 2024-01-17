<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }
    
    public function query($sql) {
        return $this->db->query($sql);
    }
    
    public function close() {
        $this->db->close();
    }

    public function getRandomPosts(){
        $stmt = $this->db->prepare("SELECT u.username, u.profile_image, p.image_data FROM users AS u RIGHT JOIN posts AS p ON u.user_id = p.user_id JOIN followers as f ON f.follower_id = p.user_id WHERE followed_id = ? ORDER BY created_at DESC LIMIT 50");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGreenPosts() {
        $stmt = $this->db->prepare("SELECT u.username, u.profile_image, p.image_data FROM users AS u RIGHT JOIN posts AS p ON u.user_id = p.user_id JOIN followers as f ON f.follower_id = p.user_id WHERE followed_id = ? AND category = true ORDER BY created_at DESC LIMIT 50");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTractorPosts() {
        $stmt = $this->db->prepare("SELECT u.username, u.profile_image, p.image_data FROM users AS u RIGHT JOIN posts AS p ON u.user_id = p.user_id JOIN followers as f ON f.follower_id = p.user_id WHERE followed_id = ? AND category = false ORDER BY created_at DESC LIMIT 50");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    

}

?>