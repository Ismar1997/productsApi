<?php 
  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'id17615045_products';
    private $username = 'id17615045_ismar';
    private $password = 'b6e?q]kin[YATg#e';
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