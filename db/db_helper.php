<?php

class DatabaseHelper {
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

    public function postFromFollowed($user_id) {
        $stmt = $this->db->prepare("SELECT p.post_id, p.user_id, p.description, p.category, p.image_data, p.created_at, p.likes
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

    public function postGreenFromFollowed($user_id) {
        $stmt = $this->db->prepare("SELECT p.post_id, p.user_id, p.description, p.category, p.image_data, p.created_at, p.likes
        FROM posts p
        JOIN followers f ON p.user_id = f.followed_id
        WHERE f.follower_id = ? AND p.category = 1
        ORDER BY p.likes DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
        
    }

    public function postTractorFromFollowed($user_id) {
        $stmt = $this->db->prepare("SELECT p.post_id, p.user_id, p.description, p.category, p.image_data, p.created_at, p.likes
        FROM posts p
        JOIN followers f ON p.user_id = f.followed_id
        WHERE f.follower_id = ? AND p.category = 0
        ORDER BY p.likes DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
        
    }

    public function randomPost($user_id) {
        $stmt = $this->db->prepare("SELECT p.post_id, p.user_id, p.description, p.category, p.image_data, p.created_at, p.likes
        FROM posts p
        WHERE p.user_id NOT IN (
            SELECT followed_id
            FROM followers
            WHERE follower_id = ?
        )
        ORDER BY RAND()
        LIMIT 50;");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotifications($user_id) {
        $stmt = $this->db->prepare("SELECT notification_text
        FROM notifications
        WHERE user_id = ?
        ORDER BY created_at DESC;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function loginCheck($email) {
        $stmt = $this->db->prepare("SELECT users.email , users.password
        FROM users
        WHERE email = ?;
        ");

        $stmt->bindParam("i", $email);
        $stmt->execute();
        $result = $stmt->get_result();

       return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registerUser($email,$password,$username) {
        $stmt = $this->db->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?);");
        $stmt->bindParam("sss", $email, $password, $username);
        if ($stmt->execute()) {
            // Registrazione riuscita
            echo json_encode(array('success' => true));
        } else {
            // Registrazione fallita
            echo json_encode(array('success' => false, 'error' => $stmt->error));
        }

        $stmt->close();
        $user_id = $stmt->insert_id; 
        $_SESSION['user_id'] = $user_id;;

    }

}

?>