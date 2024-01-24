<?php

class SimpleDB {

    protected mysqli $db;

    /**
     * @param $servername, name of the server
     * @param $username, username of the root
     * @param $password, your server password
     * @param $dbname, your db name
     * @param $port, server's port number
     */
    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    /**
     * @param string $sql The SQL query to execute, with no placeholder
     * @return bool|mysqli_result False on failure. True on success only for INSERT, UPDATE, DELETE. Other queries return the result object.
     */
    public function query(string $sql) : bool|mysqli_result
    {
        return $this->db->query($sql);
    }

    /**
     * @return true on success otherwise false
     */
    public function close(): bool
    {
        return $this->db->close();
    }

    /**
     * @param $user_id, the id of the current user active
     * @return array of associative array holding result rows
     */
    public function postFromFollowed($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id, p.description, p.category, p.image_data, p.created_at, u.username, u.profile_image
        FROM posts p
        JOIN followers f ON p.user_id = f.followed_id
        JOIN users u ON u.user_id = p.user_id
        WHERE f.follower_id = ?
        ORDER BY p.created_at DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * @param $user_id, current active user
     * @return array of associative arrays holding result rows
     */
    public function postGreenFromFollowed($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id, p.description, p.category, p.image_data, p.created_at
        FROM posts p
        JOIN followers f ON p.user_id = f.followed_id
        WHERE f.follower_id = ? AND p.category = 1
        ORDER BY p.created_at DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * @param $user_id, current users active
     * @return array an array of associative arrays holding result rows
     */
    public function postTractorFromFollowed($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id,  p.description, p.category, p.image_data, p.created_at
        FROM posts p
        JOIN followers f ON p.user_id = f.followed_id
        WHERE f.follower_id = ? AND p.category = 0
        ORDER BY p.created_at DESC
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * @param $user_id, current active user
     * @return array an array of associative arrays holding random post
     */
    public function randomPost($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id, p.description, p.category, p.image_data, p.created_at, p.category, u.username, u.profile_image
        FROM posts p
        JOIN users u ON p.user_id = u.user_id
        WHERE p.user_id != ? AND p.user_id NOT IN (
            SELECT followed_id
            FROM followers
            WHERE follower_id = ?
        )
        ORDER BY RAND()
        LIMIT 50;");
        $stmt->bind_param("ii", $user_id,$user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

