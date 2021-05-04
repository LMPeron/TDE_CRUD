<?php
require_once('Product.php');
require_once('ProductDAO.php');

session_start();

const LOCAL = "location: index.php";

$productDAO = new ProductDAO();

if (isset($_POST['novo'])) {
      $name = $_POST['name'];
      $price = (int) $_POST['price'];
      $category = $_POST['category'];
      $product = new Product($price, $category, $name);
      $productDAO->save($product);

      header(LOCAL);
}

if (isset($_GET['buscar'])) {
      $id = $_GET['id'];
      $result = $productDAO->findById($id);

      header(LOCAL);
}

if (isset($_POST['editar'])) {
      $name = $_POST['name'];
      $id = (int) $_POST['id'];
      $price = (int) $_POST['price'];
      $category = $_POST['category'];
      $product = new Product($price, $category, $name);
      $product->setId($id);
      $productDAO->update($product);

      header(LOCAL);
}

if (isset($_GET['lista'])) {
      $result = $productDAO->findAll();

      header(LOCAL);
}

if (isset($_GET['deletar'])) {
      $id = $_GET['deletar'];
      $productDAO->delete($id);

      header(LOCAL);
}
