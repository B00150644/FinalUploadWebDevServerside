<?php

class User {
    private $userName;
    private $sessionId;
    private $password;

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getSessionId() {
        return $this->sessionId;
    }

    public function setSessionId($sessionId) {
        $this->sessionId = $sessionId;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}

?>
