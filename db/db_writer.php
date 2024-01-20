<?php

require_once __DIR__ . "/db_reader.php";
class DataBaseWriter extends DataBaseReader{

    /**
     * @param $email
     * @param $password
     * @param $username
     * @return void
     */
    public function registerUser($email, $password, $username): void
    {
        $stmt = $this->db->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?);");
        $stmt->bind_Param("sss", $email, $password, $username);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * @param $username
     * @param $username2
     * @return void
     */
    public function createChat($username, $username2): void
    {
        $stmt = $this->db->prepare("INSERT INTO chats (chat_id) VALUES (CONCAT(?, ?));");
        $stmt->bind_Param("ss", $username, $username2);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * @param $chat_id
     * @param $user_id
     * @param $message
     * @return void
     */
    public function createMessage($chat_id, $user_id, $message): void
    {
        $stmt = $this->db->prepare("INSERT INTO messages (chat_id, user_id, message_text) VALUES (?, ?, ?);");
        $stmt->bind_Param("sis", $chat_id, $user_id, $message);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * @param $user_id
     * @param $post_id
     * @return void
     */
    public function newLike($user_id, $post_id): void
    {
        $stmt = $this->db->prepare("INSERT INTO agro_db.post_likes (user_id, post_id) VALUES (?, ?);");
        $stmt->bind_Param("ii", $user_id, $post_id);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * @param $user_id
     * @param $post_id
     * @return void
     */
    public function removeLike($user_id, $post_id): void
    {
        $stmt = $this->db->prepare("DELETE FROM agro_db.post_likes WHERE user_id = ? AND post_id = ?;");
        $stmt->bind_Param("ii", $user_id, $post_id);
        $stmt->execute();
        $stmt->close();
    }



}


