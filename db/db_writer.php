<?php

require_once __DIR__ . "/db_reader.php";
class DataBaseWriter extends DataBaseReader{

    /**
     * @param $email , input email
     * @param $password , input password to check if exist
     * @param $username , input username to check if exist
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
     * @param $username , username of who create the chat
     * @param $username2 , username second member of the chat
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
     * @param $chat_id , id of the chat
     * @param $user_id , sender of the message
     * @param $message , string to save in message_text
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
     * @param $user_id , id of the users who liked the post
     * @param $post_id , id of the liked post
     * @return void
     */
    public function newLike($user_id, $post_id): void
    {
        $stmt = $this->db->prepare("INSERT INTO post_likes (user_id, post_id) VALUES (?, ?);");
        $stmt->bind_Param("ii", $user_id, $post_id);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * @param $user_id , id of the users who removed the like
     * @param $post_id , id of the post where user removed the like
     * @return void
     */
    public function removeLike($user_id, $post_id): void
    {
        $stmt = $this->db->prepare("DELETE FROM post_likes WHERE user_id = ? AND post_id = ?;");
        $stmt->bind_Param("ii", $user_id, $post_id);
        $stmt->execute();
        $stmt->close();
    }



}


