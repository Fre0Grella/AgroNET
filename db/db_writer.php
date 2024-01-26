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
        $sender = $result[0]['username'];

        $receiver = str_replace($sender,"",$chat_id);
        $result = $this->getIdFromUsername($receiver);
        $receiverID = $result[0]['user_id'];
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

        $result = $this->getPostInfo($post_id);
        $receiver = $result[0]['user_id'];
        $sender = $this->getUsernameFromId($user_id)[0]['username'];
        $pic = $this->query("SELECT profile_image FROM users WHERE user_id = '$user_id'")[0]['profile_image'];
        $notification = $sender . " liked your post!";
        $this->query("INSERT INTO notifications (user_id, notification_text,profile_image) VALUES ('$receiver','$notification','$pic') ");


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
        $pic = $this->query("SELECT profile_image FROM users WHERE user_id = '$followerId'")[0]['profile_image'];
        $stmt = $this->db->prepare("INSERT INTO notifications (user_id, notification_text,profile_image) VALUES (?,?,?)");
        $stmt->bind_param("is",$followedId,$text,$pic);
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

    /**
     * @param $postId ,id of the liked post
     * @param $userId , id of the user who liked the post
     * @param $text  , text of the comment
     * @return void
     */
    public function newComment($postId, $userId, $text): void
    {
        $stmt = $this->db->prepare("INSERT INTO comments (post_id, user_id, comment_text) VALUES (?,?,?)");
        $stmt->bind_param("iis",$postId,$userId,$text);
        $stmt->execute();
        $stmt->close();

        $sender = $this->getUsernameFromId($userId)[0]['username'];
        $receiver = $this->query("SELECT user_id FROM posts
                                      WHERE post_id = '$postId'")[0]['username'];
        $pic = $this->query("SELECT profile_image FROM users WHERE user_id = '$userId'")[0]['profile_image'];
        $notifications = "$sender comments your post";
        $this->query("INSERT INTO notifications (user_id, notification_text,profile_image) VALUES ('$receiver','$notifications','$pic')");


    }
}
