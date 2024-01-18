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

    public function error() {
        return $this->db->error;
    }

    public function postFromFollowed($user_id) {
        $stmt = $this->db->prepare("SELECT p.description, p.category, p.image_data, p.created_at, p.likes
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
        $stmt = $this->db->prepare("SELECT p.description, p.category, p.image_data, p.created_at, p.likes
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
        $stmt = $this->db->prepare("SELECT  p.description, p.category, p.image_data, p.created_at, p.likes
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
        $stmt = $this->db->prepare("SELECT p.description, p.category, p.image_data, p.created_at, p.likes
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


    public function registerUser($email,$password,$username) {
        $stmt = $this->db->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?);");
        $stmt->bind_Param("sss", $email, $password, $username);
        $stmt->execute();
        $stmt->close();

        $stmt = $this->db->prepare("SELECT  user_id FROM users WHERE username = ?;");
        $stmt->bind_Param("s", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $userid = $result['user_id'];
        $_SESSION['user_id'] = $userid;    
    }

    public function getProfileInfo($user_id) {
        $stmt = $this->db->prepare("SELECT username, profile_picture, bio
        FROM users
        WHERE user_id = ?;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostsFromId($user_id) {
        $stmt = $this->db->prepare("SELECT p.description, p.category, p.image_data, p.created_at, p.likes
        FROM posts p
        WHERE p.user_id = ?
        ORDER BY p.likes DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsernameFromId($user_id) {
        $stmt = $this->db->prepare("SELECT username
        FROM users
        WHERE user_id = ?;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getSearchAdvide($search) {
        $stmt = $this->db->prepare("SELECT username, profile_image
        FROM users
        WHERE username LIKE ?;
        ");
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function createChat($username, $username2) {
        $stmt = $this->db->prepare("INSERT INTO chats (chat_id) VALUES (CONCAT(?, ?));");
        $stmt->bind_Param("ss", $username, $username2);
        $stmt->execute();
        $stmt->close();
    }

    public function getChatFromUsername($username) {
        $stmt = $this->db->prepare("SELECT *
        FROM chats
        WHERE chat_id LIKE ?;");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function createMessage($chat_id, $user_id, $message) {
        $stmt = $this->db->prepare("INSERT INTO messages (chat_id, user_id, message) VALUES (?, ?, ?);");
        $stmt->bind_Param("sis", $chat_id, $user_id, $message);
        $stmt->execute();
        $stmt->close();
    }

    public function getMessagesFromChat($chat_id) {
        $stmt = $this->db->prepare("SELECT *
        FROM messages
        WHERE chat_id = ?;");
        $stmt->bind_param("s", $chat_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }



    
    
}

?>