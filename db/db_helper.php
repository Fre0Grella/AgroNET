<?php

require_once  __DIR__ . "/db_writer.php";
class DatabaseHelper extends DataBaseWriter {


    /**
     * @param $email, mail input
     * @param $username, username input
     * @return array of associative arrays holding username || password
     */
    public function isRegistered($email, $username): array
    {
        $stmt = $this->db->prepare("SELECT email
        FROM users
        WHERE email = ? OR username = ?;
        ");
        $stmt->bind_param("ss", $email,$username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * @param $email , email to compare
     * @param $password , password to compare
     * @return array of associative arrays holding the user's email and password if found
     */
    public function loginCheck($email, $password): array
    {
        $stmt = $this->db->prepare("SELECT users.email , users.password
        FROM users
        WHERE email = ? AND password = ?;
        ");

        $stmt->bind_Param("ss", $email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

       return $result->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * @param $userId , users you want to know if follows
     * @param $userId2 , users you want if is followed
     * @return bool False if userId doesn't follow userId2, otherwise true
     */
    public function isFollower($userId, $userId2): bool
    {
        if (!($this->query("SELECT follower_id FROM followers 
            WHERE followed_id = '$userId2'
            AND follower_id = '$userId'"))) {
            return false;
        }
        return true;
    }

    /**
     * @param $userId , user who put like
     * @param $post_id , post liked
     * @return bool
     */
    public function isLiked($userId, $post_id): bool
    {
        if (!($this->query("SELECT post_id FROM post_likes 
            WHERE user_id = '$userId' 
            AND post_id = '$post_id'"))){
            return false;
        }
        return true;
    }

}

