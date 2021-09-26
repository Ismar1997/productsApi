<?php 
  class Database {
    // DB Params
    private $host = 'eu-cdbr-west-01.cleardb.com';
    private $db_name = 'heroku_b7331217180f128';
    private $username = 'b825a4ff8a361a';
    private $password = '6f502ec0';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }