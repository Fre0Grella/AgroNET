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


}

