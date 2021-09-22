<?php 
  class Product {
    // DB stuff
    private $conn;
    private $table = 'items';

    // Product Properties
    public $id;
    public $sku;
    public $name;
    public $price;
    public $product_type;
    public $size;
    public $height;
    public $width;
    public $length;
    public $weight;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET sku = :sku, name = :name,  price = :price, product_type = :product_type, size = :size, height = :height, width = :width,  length = :length, weight = :weight ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->sku = htmlspecialchars(strip_tags($this->sku));
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->price = htmlspecialchars(strip_tags($this->price));
          $this->product_type = htmlspecialchars(strip_tags($this->product_type));
          $this->size = htmlspecialchars(strip_tags($this->size));
          $this->height = htmlspecialchars(strip_tags($this->height));
          $this->width = htmlspecialchars(strip_tags($this->width));
          $this->length = htmlspecialchars(strip_tags($this->length));
          $this->weight = htmlspecialchars(strip_tags($this->weight));

          // Bind data
          $stmt->bindParam(':sku', $this->sku);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':price', $this->price);
          $stmt->bindParam(':product_type', $this->product_type);
          $stmt->bindParam(':size', $this->size);
          $stmt->bindParam(':height', $this->height);
          $stmt->bindParam(':width', $this->width);
          $stmt->bindParam(':length', $this->length);
          $stmt->bindParam(':weight', $this->weight);

          // Execute query
          if(
            $this->sku && 
            $this->name && 
            $this->price && 
            $this->product_type
            ){
            if($stmt->execute()) {
              return true;
            }
          }
          

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Post
    public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
}
  }