r<?php
// require '../connection.php'; 
require 'userclass.php';


class UserAccountManager {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    public function getUsers() {
        $sql = "SELECT UserName, SessionID, Password FROM user"; 
        $stmt = $this->conn->query($sql);

        $users = array();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new User();
                $user->setUserName($row['UserName']);
                $user->setSessionId($row['SessionID']);
                $user->setPassword($row['Password']);
                $users[] = $user;
            }
        }

        return $users;
    }
}
?>
