<?php

require_once __DIR__ . "/simpleDB.php";
class DataBaseReader extends SimpleDB {


    /**
     * @param $user_id, id of the current user
     * @return array of associative arrays holding green random post
     */
    public function GreenRandomPost($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id, p.description, p.category, p.image_data, p.created_at
        FROM posts p
        WHERE category = 1 AND p.user_id NOT IN (
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

    /**
     * @param $user_id, id of the current users
     * @return array of associative arrays holding tractor random post
     */
    public function TractoRandomPost($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id, p.description, p.category, p.image_data, p.created_at
        FROM posts p
        WHERE category = 0 AND p.user_id NOT IN (
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

    /**
     * @param $user_id, id o current user
     * @return array of associative arrays with notification_text
     */
    public function getNotifications($user_id): array
    {
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

    /**
     * @param $user_id, current user active
     * @return array of associative arrays holding username, profile_image,bio
     */
    public function getProfileInfo($user_id): array
    {
        $stmt = $this->db->prepare("SELECT username, profile_image, bio
        FROM users
        WHERE user_id = ?;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $user_id, current active user
     * @return array of associative arrays holding description, category, image_data, created_at
     */
    public function getPostsFromId($user_id): array
    {
        $stmt = $this->db->prepare("SELECT p.post_id, p.description, p.category, p.image_data, p.created_at
        FROM posts p
        WHERE p.user_id = ?
        LIMIT 50;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $user_id, current user active
     * @return array of associative arrays holding username of the current user
     */
    public function getUsernameFromId($user_id): array
    {
        $stmt = $this->db->prepare("SELECT username
        FROM users
        WHERE user_id = ?;
        ");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $email, of the users
     * @return array of associative arrays holding user_id
     */
    public function getIdFromEmail($email): array
    {
        $stmt = $this->db->prepare("SELECT user_id
        FROM users
        WHERE email = ?;
        ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $search string typed by the user
     * @return array of associative arrays holding username and profile_image
     */
    public function getSearchAdvice(string $search): array
    {
        $stmt = $this->db->prepare("SELECT username, profile_image
        FROM users
        WHERE username LIKE ?;
        ");
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);


    }

    /**
     * @param $post_id, id of a post
     * @return array of associative arrays holding comment_text, username, profile_image
     */
    public function getCommentsFromPostId($post_id): array
    {
        $stmt = $this->db->prepare("SELECT c.comment_text, u.username, u.profile_image
        FROM comments c
        JOIN users u ON c.user_id = u.user_id
        WHERE c.post_id = ?;");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $post_id, id of a post
     * @return array of associative arrays holding image_data, description, username, profile_image
     */
    public function getPostInfo($post_id): array
    {
        $stmt = $this->db->prepare("SELECT p.image_data, p.description, u.username, u.profile_image
        FROM posts p JOIN users u ON p.user_id = u.user_id
        WHERE p.post_id = ?;");

        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param $username, username of the users that we want to take id
     * @return array associative array with the  user_id
     */
    public function getIdFromUsername($username): array
    {
        $stmt = $this->db->prepare("SELECT user_id FROM users WHERE username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberOfLikesFromUser($user_id): array
    {
        $stmt = $this->db->prepare("SELECT l.post_id, count(*) as nLike
        FROM post_likes l
        RIGHT JOIN posts p ON l.post_id = p.post_id
        WHERE p.user_id = ?
        GROUP BY l.post_id;");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}


