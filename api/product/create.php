<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: *');

  include_once '../../config/Database.php';
  include_once '../../models/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Product($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->sku = $data->sku;
  $post->name = $data->name;
  $post->price = $data->price;
  $post->product_type = $data->product_type;
  $post->size = $data->size;
  $post->height = $data->height;
  $post->width = $data->width;
  $post->length = $data->length;
  $post->weight = $data->weight;

  // Create post
  if($post->create()) {
    echo json_encode(
      array('message' => 'Post Created', 'product' => $post)
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }

