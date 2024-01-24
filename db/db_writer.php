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

        $result = $this->getUsernameFromId($user_id);
        $sender = $result['username'];

        $receiver = str_replace($sender,"",$chat_id);
        $result = $this->getIdFromUsername($receiver);
        $receiverID = $result['user_id'];
        $text = "New message from $sender";
        $stmt = $this->db->prepare("INSERT INTO notifications (user_id, notification_text) VALUES (?,?)");
        $stmt->bind_param("is",$receiverID,$text);
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

    /**
     * @param $followerId
     * @param $followedId
     * @return void
     */
    public function follow($followerId, $followedId): void
    {
        $stmt = $this->db->prepare("INSERT INTO followers (follower_id, followed_id) VALUES (?,?)");
        $stmt->bind_param("ii",$followerId,$followedId);
        $stmt->execute();
        $stmt->close();

        $result = $this->getUsernameFromId($followerId);
        $followerName = $result[0]['username'];
        $text = "$followerName started to follow you";
        $stmt = $this->db->prepare("INSERT INTO notifications (user_id, notification_text) VALUES (?,?)");
        $stmt->bind_param("is",$followedId,$text);
        $stmt->execute();
        $stmt->close();
    }

    public function unfollow($followerId, $followedId): void
    {
        $stmt = $this->db->prepare("DELETE FROM followers WHERE follower_id = ? AND followed_id = ?");
        $stmt->bind_param("ii",$followerId,$followedId);
        $stmt->execute();
        $stmt->close();
    }





}


