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

    function postFromFollowed($user_id) {
        $stmt = this->db->prepare("SELECT p.post_id, p.user_id, p.description, p.category, p.image_data, p.created_at, p.likes
        FROM posts p
        JOIN followers f ON p.user_id = f.followed_id
        WHERE f.follower_id = ?
        ORDER BY p.likes DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
        
    }

}

?>